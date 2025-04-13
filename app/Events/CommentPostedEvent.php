<?php

namespace App\Events;

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
        return new PrivateChannel('document.' . $this->comment->document_id);
    }

    public function broadcastWith()
    {
        return [
            'user_name' => $this->comment->user->name,
            'content' => $this->comment->content,
        ];
    }

    public function broadcastAs()
    {
        return 'comment.posted';
    }
}

