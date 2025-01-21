<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Rock;
use App\Models\User;

class RockDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::where('name', 'szubamaolbrzymiego')->first();
        $categories = Category::all();

        // Przykładowe dane dla skał
        $rocks = [
            'Native metals' => [
                [
                    'title' => 'Gold',
                    'description' => 'Precious yellow metal.',
                    'main_mineral' => 'Gold',
                    'treatment' => 'Refined',
                    'country_of_origin' => 'South Africa',
                    'weight' => 100.5,
                    'density' => 19.32,
                    'color' => 'Yellow',
                    'clarity' => 'High',
                    'toughness' => 2.5,
                    'rarity' => 'Rare',
                    'price' => 5000,
                ],
                [
                    'title' => 'Silver',
                    'description' => 'Precious white metal.',
                    'main_mineral' => 'Silver',
                    'treatment' => 'Refined',
                    'country_of_origin' => 'Mexico',
                    'weight' => 50.0,
                    'density' => 10.49,
                    'color' => 'Silver',
                    'clarity' => 'High',
                    'toughness' => 3.0,
                    'rarity' => 'Common',
                    'price' => 100,
                ],
            ],
            'Silicates' => [
                [
                    'title' => 'Quartz',
                    'description' => 'Hard crystalline mineral.',
                    'main_mineral' => 'Quartz',
                    'treatment' => 'Polished',
                    'country_of_origin' => 'Brazil',
                    'weight' => 200.0,
                    'density' => 2.65,
                    'color' => 'Transparent',
                    'clarity' => 'Clear',
                    'toughness' => 7.0,
                    'rarity' => 'Common',
                    'price' => 20,
                ],
            ],
            'Metal alloys' => [
                [
                    'title' => 'Bronze',
                    'description' => 'An alloy of copper and tin, used for statues.',
                    'main_mineral' => 'Copper-Tin alloy',
                    'treatment' => 'Untreated',
                    'country_of_origin' => 'Greece',
                    'weight' => 200.0,
                    'density' => 8.90,
                    'color' => 'Reddish-brown',
                    'clarity' => 'Dull',
                    'toughness' => 5.5,
                    'rarity' => 'Common',
                    'price' => 15,
                ],
            ],
            'Gases' => [
                [
                    'title' => 'Oxygen',
                    'description' => 'A colorless, odorless gas essential for respiration.',
                    'main_mineral' => 'Oxygen',
                    'treatment' => 'N/A',
                    'country_of_origin' => 'Worldwide',
                    'weight' => 32.0,
                    'density' => 1.429,
                    'color' => 'Colorless',
                    'clarity' => 'N/A',
                    'toughness' => '0',
                    'rarity' => 'Common',
                    'price' => 0.2,
                ],
            ],
        'Simple sulfides' => [
            [
                'title' => 'Pyrite',
                'description' => 'Also known as fool\'s gold, a metallic luster.',
                'main_mineral' => 'Iron sulfide',
                'treatment' => 'Untreated',
                'country_of_origin' => 'USA',
                'weight' => 100.0,
                'density' => 5.0,
                'color' => 'Brassy yellow',
                'clarity' => 'Shiny',
                'toughness' => 6.0,
                'rarity' => 'Common',
                'price' => 10,
            ],
        ],
        'Arsenides, tellurides, selenides' => [
            [
                'title' => 'Arsenopyrite',
                'description' => 'An iron arsenic sulfide mineral.',
                'main_mineral' => 'Iron arsenic sulfide',
                'treatment' => 'Untreated',
                'country_of_origin' => 'Germany',
                'weight' => 120.0,
                'density' => 5.5,
                'color' => 'Steel-gray',
                'clarity' => 'Opaque',
                'toughness' => 6.0,
                'rarity' => 'Uncommon',
                'price' => 25,
            ],
        ],
        'Chlorides' => [
            [
                'title' => 'Halite',
                'description' => 'Rock salt, a cubic crystalline mineral.',
                'main_mineral' => 'Sodium chloride',
                'treatment' => 'Untreated',
                'country_of_origin' => 'USA',
                'weight' => 200.0,
                'density' => 2.16,
                'color' => 'Colorless to white',
                'clarity' => 'Transparent',
                'toughness' => 2.0,
                'rarity' => 'Common',
                'price' => 5,
            ],
        ],
        'Fluorides' => [
            [
                'title' => 'Fluorite',
                'description' => 'A colorful mineral, often fluorescent under UV light.',
                'main_mineral' => 'Calcium fluoride',
                'treatment' => 'Polished',
                'country_of_origin' => 'China',
                'weight' => 180.0,
                'density' => 3.18,
                'color' => 'Purple, green, yellow',
                'clarity' => 'Transparent',
                'toughness' => 4.0,
                'rarity' => 'Common',
                'price' => 15,
            ],
        ],
        'Simple oxides' => [
            [
                'title' => 'Hematite',
                'description' => 'An iron oxide, commonly found in red-colored rocks.',
                'main_mineral' => 'Iron oxide',
                'treatment' => 'Untreated',
                'country_of_origin' => 'Brazil',
                'weight' => 220.0,
                'density' => 5.26,
                'color' => 'Red-brown',
                'clarity' => 'Opaque',
                'toughness' => 6.5,
                'rarity' => 'Common',
                'price' => 12,
            ],
        ],
        'Complex oxides' => [
            [
                'title' => 'Spinel',
                'description' => 'A gemstone known for its bright colors and hardness.',
                'main_mineral' => 'Magnesium aluminum oxide',
                'treatment' => 'Polished',
                'country_of_origin' => 'Sri Lanka',
                'weight' => 130.0,
                'density' => 3.58,
                'color' => 'Red, blue, green',
                'clarity' => 'Transparent',
                'toughness' => 8.0,
                'rarity' => 'Uncommon',
                'price' => 100,
            ],
        ],
        'Nesosilicates' => [
            [
                'title' => 'Garnet',
                'description' => 'A group of silicate minerals that occur in a range of colors.',
                'main_mineral' => 'Aluminum silicate',
                'treatment' => 'Polished',
                'country_of_origin' => 'India',
                'weight' => 150.0,
                'density' => 3.50,
                'color' => 'Red, green, yellow',
                'clarity' => 'Transparent',
                'toughness' => 7,
                'rarity' => 'Common',
                'price' => 50,
            ],
        ],
        'Sorosilicates' => [
            [
                'title' => 'Epidote',
                'description' => 'A silicate mineral with an important role in metamorphic rocks.',
                'main_mineral' => 'Calcium-aluminum silicate',
                'treatment' => 'Untreated',
                'country_of_origin' => 'USA',
                'weight' => 180.0,
                'density' => 3.46,
                'color' => 'Green, yellow',
                'clarity' => 'Transparent',
                'toughness' => 6.5,
                'rarity' => 'Uncommon',
                'price' => 30,
            ],
        ]
        ];

        // Tworzymy skały w tabeli
        foreach ($rocks as $categoryName => $rockData) {
            // Pobierz kategorię
            $category = $categories->where('name', $categoryName)->first();

            if ($category) {
                foreach ($rockData as $rock) {
                    Rock::create([
                        'category_id' => $category->id,
                        'title' => $rock['title'],
                        'description' => $rock['description'],
                        'main_mineral' => $rock['main_mineral'],
                        'treatment' => $rock['treatment'],
                        'country_of_origin' => $rock['country_of_origin'],
                        'weight' => $rock['weight'],
                        'density' => $rock['density'],
                        'color' => $rock['color'],
                        'clarity' => $rock['clarity'],
                        'toughness' => $rock['toughness'],
                        'rarity' => $rock['rarity'],
                        'price' => $rock['price'],
                        'user_id' => $user->id,  // Przypisanie ID użytkownika
                    ]);
                }
            }
        }
    }
}
