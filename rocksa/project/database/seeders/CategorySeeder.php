<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categories based on Nickel-Strunz Classification
        $categories = [
            'Elements' => [
                'Native metals',
                'Metal alloys',
                'Gases',
                'Nonmetals',
            ],
            'Sulfides' => [
                'Simple sulfides',
                'Arsenides, tellurides, selenides',
                'Complex sulfides (sulfosalts)',
            ],
            'Halides' => [
                'Chlorides',
                'Fluorides',
                'Bromides and iodides',
            ],
            'Oxides' => [
                'Simple oxides',
                'Complex oxides',
                'Hydroxides',
            ],
            'Carbonates' => [
                'Simple carbonates',
                'Complex carbonates',
                'Nitrates',
            ],
            'Borates' => [
                'Simple borates',
                'Complex borates',
            ],
            'Sulfates' => [
                'Sulfates',
                'Chromates',
                'Molybdates',
                'Tungstates',
            ],
            'Phosphates' => [
                'Simple phosphates',
                'Arsenates',
                'Vanadates',
            ],
            'Silicates' => [
                'Nesosilicates',
                'Sorosilicates',
                'Cyclosilicates',
                'Inosilicates',
                'Phyllosilicates',
                'Tektosilicates',
            ],
            'Organic minerals' => [
                'Hydrocarbons',
                'Salts of organic acids',
                'Other organic compounds',
            ],
        ];

        foreach ($categories as $mainCategory => $subCategories) {
            // Add main category
            $mainCategoryId = DB::table('categories')->insertGetId([
                'name' => $mainCategory,
                'slug' => Str::slug($mainCategory),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add subcategories
            foreach ($subCategories as $subCategory) {
                DB::table('categories')->insert([
                    'name' => $subCategory,
                    'slug' => Str::slug($subCategory),
                    'parent_id' => $mainCategoryId, // Set as subcategory
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
