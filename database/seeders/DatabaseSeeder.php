<?php

namespace Database\Seeders;

use App\Models\Dashboard\Category;
use App\Models\Dashboard\Product;
use App\Models\Dashboard\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => User::STATUS_ACTIVE,
        ]);
        User::factory(200)->create();
        $categories = Category::factory(200)->create();

        $stores = Store::factory(200)->create();

        Product::factory(200)->create()
            ->each(function ($product) use ($categories, $stores) {
                // Assign a random store to the product
                $product->store_id = $stores->random()->id;
                $product->save();
                // Attach random categories to the product
                $product->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
    }
}
