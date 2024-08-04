<?php

namespace App\Filament\Resources\PlayLevelResource\Pages;

use App\Filament\Resources\PlayLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlayLevel extends ViewRecord
{
    protected static string $resource = PlayLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
