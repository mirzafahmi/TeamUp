<?php

namespace App\Filament\Resources\PreferredSportResource\Pages;

use App\Filament\Resources\PreferredSportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPreferredSport extends ViewRecord
{
    protected static string $resource = PreferredSportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
