<?php

namespace App\Filament\Resources\EventLocationResource\Pages;

use App\Filament\Resources\EventLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEventLocation extends ViewRecord
{
    protected static string $resource = EventLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
