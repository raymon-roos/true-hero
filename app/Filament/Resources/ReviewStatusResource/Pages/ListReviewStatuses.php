<?php

namespace App\Filament\Resources\ReviewStatusResource\Pages;

use App\Filament\Resources\ReviewStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReviewStatuses extends ListRecords
{
    protected static string $resource = ReviewStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
