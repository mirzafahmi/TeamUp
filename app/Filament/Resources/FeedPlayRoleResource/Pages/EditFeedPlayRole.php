<?php

namespace App\Filament\Resources\FeedPlayRoleResource\Pages;

use App\Filament\Resources\FeedPlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFeedPlayRole extends EditRecord
{
    protected static string $resource = FeedPlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
