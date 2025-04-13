<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'user_id',
        'content',
    ];

    // 🔁 Relation : un commentaire appartient à un document
    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    // 🔁 Relation : un commentaire appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
