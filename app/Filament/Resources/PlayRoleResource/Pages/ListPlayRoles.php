<?php

namespace App\Filament\Resources\PlayRoleResource\Pages;

use App\Filament\Resources\PlayRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayRoles extends ListRecords
{
    protected static string $resource = PlayRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
