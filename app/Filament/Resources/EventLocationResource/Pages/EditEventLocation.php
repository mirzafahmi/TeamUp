<?php

namespace App\Filament\Resources\EventLocationResource\Pages;

use App\Filament\Resources\EventLocationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventLocation extends EditRecord
{
    protected static string $resource = EventLocationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
