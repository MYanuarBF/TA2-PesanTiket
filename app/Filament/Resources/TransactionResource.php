<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
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

    protected static ?string $label = 'Menu Pemesanan Tiket';

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
                    ->maxLength(15),
                Forms\Components\TextInput::make('jumlah_orang')
                    ->required()
                    ->numeric()
                    ->reactive()  // Make this field reactive to update total_harga on change
                    ->afterStateUpdated(fn ($state, callable $set) => $set('total_harga', $state * 50000)),
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
                ->visible(fn ($record) => $record->status === 'pending')
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
