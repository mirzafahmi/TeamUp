<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\JoinStatus;
use App\Services\BadgeService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }

    public function store(Request $request){

        $status = JoinStatus::pluck('id', 'name');
        
        $request->merge([
            'request_to_join' => $request->has('request_to_join') ? true : false,
            'join_status_id' => $status['Pending'], 
            'is_read' => false,   
        ]);
        
        $validated = $request->validate([
            'feed_id' => 'required',
            'user_id' => 'required',
            'content' => 'required|min:3',
            'request_to_join' => 'boolean',
            'play_role_id' => 'required_if:request_to_join,true|exists:play_roles,id',
            'join_status_id' => 'required|exists:join_statuses,id',
            'is_read' => 'required'
        ]);

        Comment::create($validated);

        $this->badgeService->checkAndAssignBadges($validated['user_id']);

        return redirect()->route('feeds.show', $request->feed_id)->with('success','Your comment created successfully!');
    }

    public function update(Request $request, Comment $comment)
    {
        
        $request->merge([
            'request_to_join' => $request->has('request_to_join') ? true : false,
        ]);
        
        if ($request->request_to_join == false){
            $request->merge([
                'play_role_id' => null,
            ]);
        }
        
        $validated = $request->validate([
            'feed_id' => 'required',
            'user_id' => 'required',
            'content' => 'required|min:3',
            'request_to_join' => 'boolean',
            'play_role_id' => 'nullable|required_if:request_to_join,true|exists:play_roles,id',
        ]);

        $comment->update($validated);

        return redirect()->route('feeds.show', $request->feed_id)
            ->with('success','Your comment updated successfully!');
    }

    public function destroy(Comment $comment, Request $request)
    {
        $feed_id = $comment->feed_id;
        $comment->delete();

        return redirect()->route('feeds.show', $feed_id)
            ->with('success', "Your comment is deleted successfullly");
    }
}
