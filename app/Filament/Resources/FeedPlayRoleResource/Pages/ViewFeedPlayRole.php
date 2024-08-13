<?php

namespace App\Filament\Resources\FeedPlayRoleResource\Pages;

use App\Filament\Resources\FeedPlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFeedPlayRole extends ViewRecord
{
    protected static string $resource = FeedPlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
