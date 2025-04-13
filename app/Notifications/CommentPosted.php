<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class CommentPosted extends Notification
{
    use Queueable;

    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'comment_id' => $this->comment->id,
            'document_id' => $this->comment->document_id,
            'user_name' => $this->comment->user->name,
            'message' => 'Un nouveau commentaire a été ajouté.',
        ]);
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'comment_id' => $this->comment->id,
            'document_id' => $this->comment->document_id,
            'user_name' => $this->comment->user->name,
            'message' => '📢 Nouveau commentaire posté',
        ]);
    }
}
