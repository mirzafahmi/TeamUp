<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(NotificationService $notificationService)
    {
        $user = auth()->user();

        $notifications = $notificationService->getUserNotificationsWithDetails($user);

        return view('notification.index', compact('notifications'));
    }
}
