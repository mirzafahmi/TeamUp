<?php

namespace App\Filament\Resources\PlayLevelResource\Pages;

use App\Filament\Resources\PlayLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayLevels extends ListRecords
{
    protected static string $resource = PlayLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
