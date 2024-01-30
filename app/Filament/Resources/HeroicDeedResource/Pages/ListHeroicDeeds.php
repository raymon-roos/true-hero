<?php

namespace App\Filament\Resources\HeroicDeedResource\Pages;

use App\Filament\Resources\HeroicDeedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroicDeeds extends ListRecords
{
    protected static string $resource = HeroicDeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
