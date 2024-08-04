<?php

namespace App\Filament\Resources\PlayModeResource\Pages;

use App\Filament\Resources\PlayModeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPlayMode extends ViewRecord
{
    protected static string $resource = PlayModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
