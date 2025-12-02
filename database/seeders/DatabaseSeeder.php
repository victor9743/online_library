<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\Author::factory()->create(['name'=>'J. K. Rowling']);
        \App\Models\Author::factory()->create(['name'=>'George Orwell']);
        \App\Models\Category::create(['name'=>'Ficção']);
        \App\Models\Category::create(['name'=>'Clássicos']);

        \App\Models\Book::create([
            'title'=>'1984',
            'description'=>'Distopia...',
            'author_id'=>2,
            'category_id'=>2,
            'price'=>29.90,
            'status'=>\App\Models\Book::STATUS_AVAILABLE,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
    
}
