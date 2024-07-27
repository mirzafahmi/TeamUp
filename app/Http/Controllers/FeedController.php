<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function show(Feed $feed)
    {
        return view('feeds.show', compact('idea'));
    }

    public function store($request)
    {
        $validated = $request->validate([
            'spot_availablity' => 'required|min:1',
            'content' => 'required|min:1',
            'event_date' => 'required|dateTime'
        ]);

        $validate['user_id'] = auth()->user()->id;

        Feed::create($validated);

        return redirect()->route('index')->with('success', 'TeamUp Feed created successfully!');
    }
}
