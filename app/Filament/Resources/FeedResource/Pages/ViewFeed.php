<?php

namespace App\Filament\Resources\FeedResource\Pages;

use App\Filament\Resources\FeedResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFeed extends ViewRecord
{
    protected static string $resource = FeedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
