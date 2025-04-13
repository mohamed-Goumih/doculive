<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Document;
class DocumentSeeder extends Seeder
{
   
    public function run(): void
{
    \App\Models\User::factory(5)->create(); // créer des utilisateurs si besoin
    Document::factory(10)->create();        // 10 documents
}
}
