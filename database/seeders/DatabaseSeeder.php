<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Author;
use App\Models\Category;
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

        // Método 1: Usando create() diretamente (sem factory)
        Author::create(['name' => 'J. K. Rowling']);
        Author::create(['name' => 'George Orwell']);
        
        Category::create(['name' => 'Fiction']);
        Category::create(['name' => 'Classics']);
        Category::create(['name' => 'Dystopia']);
        Category::create(['name' => 'Fantasy']);
    }
}