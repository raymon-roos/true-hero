<?php

namespace App\Filament\Resources\HeroicDeedResource\Pages;

use App\Filament\Resources\HeroicDeedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeroicDeed extends EditRecord
{
    protected static string $resource = HeroicDeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
