<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentPostedEvent implements ShouldBroadcast
{
    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function broadcastOn()
    {
        //return new PrivateChannel('document.' . $this->comment->document_id);
        return new Channel('document.' . $this->comment->document_id); // ← Public channel

    }
    public function broadcastWith()
    {
        return [
            'user_name' => $this->comment->user->name,
            'content' => $this->comment->content,
            'created_at' => $this->comment->created_at->format('d M Y H:i')
        ];
    }

    public function broadcastAs()
    {
        // return 'comment.posted';
        return 'CommentPostedEvent';
    }
}

