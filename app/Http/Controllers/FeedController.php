<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\FeedPlayRole;
use App\Models\Sport;
use App\Models\User;
use App\Services\BadgeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FeedController extends Controller
{
    protected $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }
    
    public function index()
    {
        $editing = false;

        $sports = Sport::whereDoesntHave('preferredByUsers', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->withCount('preferredByUsers')
        ->orderBy('preferred_by_users_count', 'desc')
        ->take(4)
        ->get();

        return view('index', compact('editing', 'sports'));
    }

    public function show(Request $request, Feed $feed)
    {
        $comments = $feed->comments();

        return view('feeds.show', compact('feed', 'comments'));
    }

    public function create()
    {
        return view('feeds.create');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'play_level_id' => 'required|exists:play_levels,id',
            'play_mode_id' => 'required|exists:play_modes,id',
            'play_role_id' => 'required|array|min:1', 
            'play_role_id.*' => 'nullable|exists:play_roles,id',
            'spot_availability' => 'required|array|min:1',
            'spot_availability.*' => 'nullable|integer|min:1',
            'content' => 'required|min:1',
            'event_location_id' => 'required',
            'event_date' => 'required|date_format:Y-m-d\TH:i',
        ]);
        
        $playRoleIds = $validated['play_role_id'] ?? [];
        $spotAvailabilities = $validated['spot_availability'] ?? [];
        
        if (count($playRoleIds) === 1 && is_null($playRoleIds[0])) {
            return back()->withErrors(['play_role_id' => 'Play Role ID cannot be null if provided.'])
                         ->withInput();
        }
    
        if (count($spotAvailabilities) === 1 && is_null($spotAvailabilities[0])) {
            return back()->withErrors(['spot_availability' => 'Spot Availability cannot be null if provided.'])
                         ->withInput();
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['event_date'] = Carbon::createFromFormat('Y-m-d\TH:i', $validated['event_date'])
            ->format('Y-m-d H:i:s');

        $feed = Feed::create($validated);

        foreach ($playRoleIds as $index => $roleId) {
            if ($roleId === null || !isset($spotAvailabilities[$index]) || $spotAvailabilities[$index] === null) {
                continue;
            }
    
            FeedPlayRole::create([
                'feed_id' => $feed->id,
                'play_role_id' => $roleId,
                'spot_availability' => $spotAvailabilities[$index]
            ]);
        }

        $this->badgeService->checkAndAssignBadges($validated['user_id']);

        return redirect()->route('index')
            ->with('success', 'Your TeamUp Feed created successfully!');
    }

    public function edit(Feed $feed)
    {
        $editing = true;

        return view('feeds.edit', compact('feed', 'editing'));
    }

    public function update(Request $request, Feed $feed)
    {
        $validated = $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'play_level_id' => 'required|exists:play_levels,id',
            'play_mode_id' => 'required|exists:play_modes,id',
            'play_role_id' => 'array', 
            'spot_availability' => 'array',
            'content' => 'required|min:1',
            'event_location_id' => 'required',
            'event_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['event_date'] = Carbon::createFromFormat('Y-m-d\TH:i', $validated['event_date'])
            ->format('Y-m-d H:i:s');

        $feed->update($validated);

        $playRoleIds = $validated['play_role_id'] ?? [];
        $spotAvailabilities = $validated['spot_availability'] ?? [];
        
        if (count($playRoleIds) === 1 && is_null($playRoleIds[0])) {
            return back()->withErrors(['play_role_id' => 'Play Role ID cannot be null if provided.'])
                         ->withInput();
        }
    
        if (count($spotAvailabilities) === 1 && is_null($spotAvailabilities[0])) {
            return back()->withErrors(['spot_availability' => 'Spot Availability cannot be null if provided.'])
                         ->withInput();
        }

        $pivotData = [];
        foreach ($playRoleIds as $index => $roleId) {
            if ($roleId !== null && isset($spotAvailabilities[$index]) && $spotAvailabilities[$index] !== null) {
                $pivotData[$roleId] = [
                    'id' => (string) Str::uuid(),
                    'spot_availability' => $spotAvailabilities[$index]
                ];
            }
        }
        $feed->playRoles()->sync($pivotData);

        return redirect()->route('feeds.show', $feed->id)
            ->with('success', 'Your TeamUp Feed updated successfully!');
    }

    public function destroy(Feed $feed)
    {
        $feed->delete();

        return redirect()->route('index')
            ->with('success', 'Your TeamUp Feed deleted successfully!');
    }
}
