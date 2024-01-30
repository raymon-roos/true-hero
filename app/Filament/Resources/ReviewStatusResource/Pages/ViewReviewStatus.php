<?php

namespace App\Filament\Resources\ReviewStatusResource\Pages;

use App\Filament\Resources\ReviewStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReviewStatus extends ViewRecord
{
    protected static string $resource = ReviewStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
