<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Document;
use App\Models\User;
class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [

            'document_id' => Document::inRandomOrder()->first()?->id ?? Document::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'content' => fake()->text(200),
        ];
    }
}
