<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Ordinateur portable', 'price' => '899.99', 'category_slug' => 'technologie', 'description' => 'Ordinateur portable performant'],
            ['name' => 'Casque Bluetooth', 'price' => '59.90', 'category_slug' => 'technologie', 'description' => 'Casque sans fil'],
            ['name' => 'Télescope', 'price' => '249.50', 'category_slug' => 'science', 'description' => 'Télescope pour amateurs'],
            ['name' => 'Ballon de foot', 'price' => '29.99', 'category_slug' => 'sport', 'description' => 'Ballon officiel'],
            ['name' => 'Guide économique', 'price' => '19.90', 'category_slug' => 'economie', 'description' => 'Livre sur l\'économie moderne'],
            ['name' => 'Vinyle classique', 'price' => '14.50', 'category_slug' => 'culture', 'description' => 'Album vinyle'],
        ];

        foreach ($products as $p) {
            $slug = Str::slug($p['category_slug']);
            $category = Category::where('slug', $slug)->first();

            if (! $category) {
                continue; // skip if category missing
            }

            Product::updateOrCreate(
                ['name' => $p['name']],
                [
                    'price' => $p['price'],
                    'category_id' => $category->id,
                    'description' => $p['description'] ?? null,
                ]
            );
        }
    }
}