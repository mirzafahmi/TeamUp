<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\FeedPlayRole;
use App\Models\User;
use App\Services\BadgeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $feeds = Feed::with(['sport', 'playLevel', 'playMode', 'playRole', 'user'])
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5);

        return view('index', compact('feeds', 'editing'));
    }

    public function show(Request $request, Feed $feed)
    {
        $feed = $feed->load(['sport', 'playLevel', 'playMode', 'playRole', 'user']);

        return view('feeds.show', compact('feed'));
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
            'play_role_id' => 'array', 
            'spot_availability' => 'array',
            'content' => 'required|min:1',
            'event_location_id' => 'required',
            'event_date' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['event_date'] = Carbon::createFromFormat('Y-m-d\TH:i', $validated['event_date'])
            ->format('Y-m-d H:i:s');

        $feed = Feed::create($validated);

        $playRoleIds = $validated['play_role_id'];
        $spotAvailabilities = $validated['spot_availability'];

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

        $playRoleIds = $validated['play_role_id'];
        $spotAvailabilities = $validated['spot_availability'];

        $pivotData = [];
        foreach ($playRoleIds as $index => $roleId) {
            if ($roleId !== null && isset($spotAvailabilities[$index]) && $spotAvailabilities[$index] !== null) {
                $pivotData[$roleId] = ['spot_availability' => $spotAvailabilities[$index]];
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
