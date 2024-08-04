<?php

namespace App\Filament\Resources\UserBadgeResource\Pages;

use App\Filament\Resources\UserBadgeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserBadge extends EditRecord
{
    protected static string $resource = UserBadgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
