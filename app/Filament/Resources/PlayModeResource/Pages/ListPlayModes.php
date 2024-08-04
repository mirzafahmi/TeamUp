<?php

namespace App\Filament\Resources\PlayModeResource\Pages;

use App\Filament\Resources\PlayModeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayModes extends ListRecords
{
    protected static string $resource = PlayModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
