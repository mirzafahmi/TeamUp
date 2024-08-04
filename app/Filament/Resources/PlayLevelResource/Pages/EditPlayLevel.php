<?php

namespace App\Filament\Resources\PlayLevelResource\Pages;

use App\Filament\Resources\PlayLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayLevel extends EditRecord
{
    protected static string $resource = PlayLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
