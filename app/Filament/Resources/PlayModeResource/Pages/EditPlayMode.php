<?php

namespace App\Filament\Resources\PlayModeResource\Pages;

use App\Filament\Resources\PlayModeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayMode extends EditRecord
{
    protected static string $resource = PlayModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
