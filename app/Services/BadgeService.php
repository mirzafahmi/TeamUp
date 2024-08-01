<?php

namespace App\Services;

use App\Models\User;
use App\Http\Controllers\BadgeController;

class BadgeService
{
    protected $badgeController;

    public function __construct(BadgeController $badgeController)
    {
        $this->badgeController = $badgeController;
    }

    public function checkAndAssignBadges($userId)
    {
        $user = User::findOrFail($userId);
        $this->badgeController->checkBadges($user);
    }
}