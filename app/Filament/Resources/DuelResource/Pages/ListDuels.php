<?php

namespace App\Filament\Resources\DuelResource\Pages;

use App\Filament\Resources\DuelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDuels extends ListRecords
{
    protected static string $resource = DuelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
