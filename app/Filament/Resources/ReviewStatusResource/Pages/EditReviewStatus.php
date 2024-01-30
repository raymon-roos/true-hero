<?php

namespace App\Filament\Resources\ReviewStatusResource\Pages;

use App\Filament\Resources\ReviewStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReviewStatus extends EditRecord
{
    protected static string $resource = ReviewStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
