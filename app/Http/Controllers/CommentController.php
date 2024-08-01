<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        $request->merge([
            'request_to_join' => $request->has('request_to_join') ? true : false
        ]);

        $validated = $request->validate([
            'feed_id' => 'required',
            'user_id' => 'required',
            'content' => 'required|min:3',
            'request_to_join' => 'boolean'
        ]);

        Comment::create($validated);

        $this->badgeService->checkAndAssignBadges($validated['user_id']);

        return redirect()->route('feeds.show', $request->feed_id)->with('success','Your comment created successfully!');
    }

    public function update(Request $request, Comment $comment)
    {
        $request->merge([
            'request_to_join' => $request->has('request_to_join') ? true : false
        ]);

        $validated = $request->validate([
            'feed_id' => 'required',
            'user_id' => 'required',
            'content' => 'required|min:3',
            'request_to_join' => 'boolean'
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
