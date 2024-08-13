<?php

namespace App\Filament\Resources\FeedPlayRoleResource\Pages;

use App\Filament\Resources\FeedPlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFeedPlayRoles extends ListRecords
{
    protected static string $resource = FeedPlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
