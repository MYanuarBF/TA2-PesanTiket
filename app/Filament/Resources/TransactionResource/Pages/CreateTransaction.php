<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Illuminate\Support\Facades\Redirect;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
