<?php

namespace App\Filament\Resources\UserBadgeResource\Pages;

use App\Filament\Resources\UserBadgeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserBadge extends CreateRecord
{
    protected static string $resource = UserBadgeResource::class;
}
