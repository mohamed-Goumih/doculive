<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Document;

class CommentSection extends Component
{
    public Document $document;
    public string $content = '';
    public array $comments = [];

    protected $listeners = [
        "echo:document.{document.id},CommentPostedEvent" => "receiveBroadcastedComment"
    ];

    public function mount()
    {
        $this->loadComments();
    }

    public function post()
    {
        Comment::create([
            'document_id' => $this->document->id,
            'user_id' => auth()->id(),
            'content' => $this->content,
        ]);

        $this->content = '';

        broadcast(new \App\Events\CommentPostedEvent(Comment::latest()->first()))->toOthers();

        $this->loadComments();
    }

    public function receiveBroadcastedComment()
    {
        $this->loadComments(); // recharge la liste
    }

    public function loadComments()
    {
        $this->comments = $this->document->comments()->oldest()->with('user')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}


