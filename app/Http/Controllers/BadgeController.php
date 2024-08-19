<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BadgeController extends Controller
{
    public function assignBadge(User $user, $badgeName)
    {
        $badge = Badge::where("name", $badgeName)->first();

        if ($badge && !$user->badges->contains($badge->id)){
            $user->badges()->attach([
                $badge->id => ['id' => (string) Str::uuid()]
            ]);
        }
    }

    public function checkBadges(User $user)
    {
        if ($user->feeds()->count() > 0) {
            $this->assignBadge($user,'Getting Started');
        }

        if ($user->followers()->count() > 5) {
            $this->assignBadge($user, 'Community Leader');
        }

        if ($user->feeds()->count() > 5) {
            $this->assignBadge($user,'Veteran');
        }

        if($user->preferredSports()->count() > 3) {
            $this->assignBadge($user,'Enthusiast');
        }

        if($user->comments()->count() > 5) {
            $this->assignBadge($user,'Social Butterfly');
        }
    }
}
