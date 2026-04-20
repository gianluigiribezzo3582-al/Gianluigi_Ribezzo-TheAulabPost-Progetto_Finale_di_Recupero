<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
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
        $categories = [
            'Politica',
            'Economia',
            'Sport',
            'Spettacolo',
            'Tecnologia',
            'Salute',
            'Scienza',
            'Cultura',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        Article::factory(100)->create([
            'category_id' => fn () => Category::all()->random()->id,
        ]);
    }
}
