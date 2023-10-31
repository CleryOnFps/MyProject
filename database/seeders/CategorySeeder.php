<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creation de fausse category grace au composant faker 

        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $name = $faker->word;
            $slug = Str::slug($name); // Génération du slug à partir du nom

            Category::create([
                'name' => $name,
                'slug' => $slug, // Enregistrez le slug
                'description' => $faker->sentence,
                'is_visible' => true,
            ]);
        }
    }
}
