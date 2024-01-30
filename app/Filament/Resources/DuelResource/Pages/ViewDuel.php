<?php

namespace App\Filament\Resources\DuelResource\Pages;

use App\Filament\Resources\DuelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDuel extends ViewRecord
{
    protected static string $resource = DuelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
