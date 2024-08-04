<?php

namespace App\Filament\Resources\PlayRoleResource\Pages;

use App\Filament\Resources\PlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlayRole extends ViewRecord
{
    protected static string $resource = PlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
