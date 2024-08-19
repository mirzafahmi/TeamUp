<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\JoinStatus;
use Livewire\Component;

class ProcessRequest extends Component
{
    public $comment;
    public $status;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->status = $comment->joinStatus->name;
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        
        $validated = $this->validate([
            'status' => 'required|in:Approved,Rejected,Pending',
        ]);

        $statusId = JoinStatus::pluck('id', 'name');

        $this->comment->join_status_id = $statusId[$validated['status']];
        $this->comment->save();
        
        
        if($validated['status'] != 'Pending') {
            $feedOwner = $this->comment->feed->user;
            $targetUser = $this->comment->user;
            $commentText = sprintf(
                '@%s your request to join has been %s',
                $targetUser->username,
                strtolower($validated['status'])
            );
        
            Comment::create([
                'feed_id' => $this->comment->feed_id,
                'user_id' => $feedOwner->id,
                'content' => $commentText,
                'request_to_join' => false, 
                'play_role_id' => null,     
                'join_status_id' => $statusId['Pending'],   
                'is_read' => false,
            ]);
        }    

        $this->comment->refresh();
    }

    public function render()
    {
        return view('livewire.process-request');
    }
}
