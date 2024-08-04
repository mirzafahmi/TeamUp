<?php

namespace App\Filament\Resources\PreferredSportResource\Pages;

use App\Filament\Resources\PreferredSportResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreferredSport extends EditRecord
{
    protected static string $resource = PreferredSportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
