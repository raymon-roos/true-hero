<?php

namespace App\Filament\Resources\DuelResource\Pages;

use App\Filament\Resources\DuelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDuel extends EditRecord
{
    protected static string $resource = DuelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
