<?php

namespace App\Filament\Resources\ThreatResource\Pages;

use App\Filament\Resources\ThreatResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewThreat extends ViewRecord
{
    protected static string $resource = ThreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
