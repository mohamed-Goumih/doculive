<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'user_id',
    ];
    // 🔁 Relation : un document appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // 🔁 Relation : un document a plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
