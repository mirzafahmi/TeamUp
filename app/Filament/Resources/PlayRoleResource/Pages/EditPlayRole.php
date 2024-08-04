<?php

namespace App\Filament\Resources\PlayRoleResource\Pages;

use App\Filament\Resources\PlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayRole extends EditRecord
{
    protected static string $resource = PlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
