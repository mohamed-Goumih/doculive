<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
use App\Models\User;
use Illuminate\Support\Str;
class DocumentFactory extends Factory
{
   
    public function definition(): array
    {
        return [

            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'file_path' => 'documents/' . Str::random(10) . '.pdf',
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
        ];
    }
}
