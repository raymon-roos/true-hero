<?php

namespace App\Filament\Resources\ThreatResource\Pages;

use App\Filament\Resources\ThreatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThreat extends EditRecord
{
    protected static string $resource = ThreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
