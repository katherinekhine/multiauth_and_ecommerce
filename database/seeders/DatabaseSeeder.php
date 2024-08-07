<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $brand_1 = \App\Models\Brand::create([
            'name' => 'Nike',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $brand_2 = \App\Models\Brand::create([
            'name' => 'Crocs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $brand_3 = \App\Models\Brand::create([
            'name' => 'Adidas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $brand_4 = \App\Models\Brand::create([
            'name' => 'Puma',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $brand_5 = \App\Models\Brand::create([
            'name' => 'Jordan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $brand_6 = \App\Models\Brand::create([
            'name' => 'Ipanema',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_1 = \App\Models\Category::create([
            'name' => 'Women Shoe',
            'brand_id' => $brand_1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_2 = \App\Models\Category::create([
            'name' => 'Women Shoe',
            'brand_id' => $brand_2->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_3 = \App\Models\Category::create([
            'name' => 'Women Shoe',
            'brand_id' => $brand_3->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_4 = \App\Models\Category::create([
            'name' => 'Women Shoe',
            'brand_id' => $brand_6->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_5 = \App\Models\Category::create([
            'name' => 'Men Shoe',
            'brand_id' => $brand_1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_6 = \App\Models\Category::create([
            'name' => 'Men Shoe',
            'brand_id' => $brand_2->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $category_7 = \App\Models\Category::create([
            'name' => 'Men Shoe',
            'brand_id' => $brand_3->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_8 = \App\Models\Category::create([
            'name' => 'Men Shoe',
            'brand_id' => $brand_4->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $category_9 = \App\Models\Category::create([
            'name' => 'Kid Shoe',
            'brand_id' => $brand_1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $category_10 = \App\Models\Category::create([
            'name' => 'Kid Shoe',
            'brand_id' => $brand_2->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $category_11 = \App\Models\Category::create([
            'name' => 'Kid Shoe',
            'brand_id' => $brand_3->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        \App\Models\Product::create([
            'name' => 'Nike Air Zoom Pegasus 36',
            'photo' => 'images/nike-women.jpg',
            'description' => 'Lorem ipsum dolor sit amet, justo enim elementum sapien, non rhoncus velit nunc a velit.',
            'price' => 150000,
            'brand_id' => $brand_1->id,
            'category_id' => $category_1->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
