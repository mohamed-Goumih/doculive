<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentSeeder extends Seeder
{
    public function run(): void
    {
        Comment::factory(30)->create(); // 30 commentaires aléatoires
    }
}
