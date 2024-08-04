<?php

namespace App\Filament\Resources\SportResource\Pages;

use App\Filament\Resources\SportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSport extends ViewRecord
{
    protected static string $resource = SportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
