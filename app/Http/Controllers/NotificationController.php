<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(NotificationService $notificationService)
    {
        $userId = auth()->id();
        $username = auth()->user()->username;

        $notifications = $notificationService->getNotifications($userId, $username);

        return view('notification.index', compact('notifications'));
    }
}
