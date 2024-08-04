<?php

namespace App\Filament\Resources\SportResource\Pages;

use App\Filament\Resources\SportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSport extends EditRecord
{
    protected static string $resource = SportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
