<?php

namespace App\Filament\Resources\EventLocationResource\Pages;

use App\Filament\Resources\EventLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventLocations extends ListRecords
{
    protected static string $resource = EventLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
