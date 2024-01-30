<?php

namespace App\Filament\Resources\HeroicDeedResource\Pages;

use App\Filament\Resources\HeroicDeedResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroicDeed extends ViewRecord
{
    protected static string $resource = HeroicDeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
