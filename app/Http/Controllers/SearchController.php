<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
        $authUser = auth()->user()->id;

        $feeds = Feed::where('content', 'like', "%{$query}%")
            ->orwhereHas('user', function ($q) use ($query) {
                $q->where('username', 'like', "%{$query}%");
            })
            ->orWhereHas('sport', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->paginate(5);

        $users = User::where('username', 'like', "%{$query}%")
            ->where('id', '!=', $authUser)
            ->paginate(5);
        
        return view('search.show', compact('query', 'feeds', 'users'));
    }
}
