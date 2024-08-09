<?php

namespace App\Http\Controllers;

use App\Models\EventLocation;
use Illuminate\Http\Request;

class EventLocationController extends Controller
{
    public function show(EventLocation $eventLocation)
    {
        return view('event-locations.show', compact('eventLocation'));
    }
}
