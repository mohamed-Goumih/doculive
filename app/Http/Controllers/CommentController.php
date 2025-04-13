<?php

namespace App\Http\Controllers;

use App\Events\CommentPostedEvent;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\CommentPosted;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'document_id' => 'required|exists:documents,id',
            'content' => 'required|string',
        ]);
    
        $comment = Comment::create([
            'document_id' => $data['document_id'],
            'user_id' => auth()->id(),
            'content' => $data['content'],
        ]);
    
        broadcast(new CommentPostedEvent($comment))->toOthers();
    
        return back();
    }
    
}
