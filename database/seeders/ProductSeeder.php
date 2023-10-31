<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creation de faut Produit grace a faker

        $faker = Faker::create();
        $categories = Category::pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            $name = $faker->word;
            $slug = Str::slug($name); // Génération du slug à partir du nom

            $product = Product::create([
                'name' => $name,
                'slug' => $slug, // Enregistrez le slug
                'description' => $faker->sentence,
                'qty' => $faker->numberBetween(1, 100),
                'security_stock' => $faker->numberBetween(0, 20),
                'is_visible' => true,
                'price' => $faker->randomFloat(2, 1, 100),
                'published_at' => $faker->dateTimeThisYear,
            ]);

            // Attachez chaque produit à une catégorie aléatoire
            $product->categories()->attach($faker->randomElements($categories, $faker->numberBetween(1, 3)));
        }
    }
}
