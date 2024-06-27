<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\Action;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class TransactionResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Menu Pemesanan Tiket';

    protected static ?string $label = 'Transaksi';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('nomor_telepon')
                    ->tel()
                    ->required()
                    ->maxLength(15)
                    ->numeric(), // Hanya bisa diisi angka
                Forms\Components\TextInput::make('jumlah_orang')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                        $price = Price::first()->amount; // Ambil harga dari tabel prices
                        $set('total_harga', $state * $price);
                    }),
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->format('Y-m-d')
                    ->minDate(today()), // Tidak bisa memilih tanggal yang sudah lewat
                Forms\Components\TextInput::make('total_harga')
                    ->required()
                    ->readOnly()
                    ->numeric(),
                Forms\Components\Hidden::make('status')
                    ->default('pending'),
                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'selesai' => 'Selesai'
                    ])
                    ->required()
                    ->default('pending')
                    ->visible(fn (string $context): bool => $context === 'edit'),                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $isUser = Auth::user()->hasRole('pengguna');
                if ($isUser) {
                    $query->where('user_id', Auth::user()->id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('No.')
                    ->rowIndex()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->visible(fn () => Auth::user()->hasRole('super_admin')),
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('jumlah_orang')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->numeric()
                    ->money('idr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('bayar')
                ->icon('heroicon-m-credit-card')
                ->button()
                ->url(fn ($record) => route('payment.pay', $record))
                ->labeledFrom('md')
                ->visible(fn ($record) => $record->status === 'pending'),
                Action::make('cetak_nota')
                    ->icon('heroicon-o-printer')
                    ->button()
                    ->url(fn ($record) => route('payment.print', $record))
                    ->labeledFrom('md')
                    ->visible(fn ($record) => $record->status === 'selesai'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }
}

