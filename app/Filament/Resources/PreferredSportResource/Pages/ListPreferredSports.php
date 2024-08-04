<?php

namespace App\Filament\Resources\PreferredSportResource\Pages;

use App\Filament\Resources\PreferredSportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPreferredSports extends ListRecords
{
    protected static string $resource = PreferredSportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
