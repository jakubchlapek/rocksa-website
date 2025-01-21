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
        $user = User::where('name', 'John Doe')->first();
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
            // Dodaj więcej danych o skałach w zależności od kategorii
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
