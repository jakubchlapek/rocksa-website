<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\File;

class InsertTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tworzenie użytkownika i pobranie jego ID
        $userId = DB::table('users')->insertGetId([
            'name' => 'skolim',
            'email' => 'skolim@latino.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // Hashowanie hasła
            'created_at' => now(),
            'updated_at' => now(),
        ]);


         // $quartzImagePath = public_path('/static/rock1.jpg');
         // $diamondImagePath = public_path('/static/rock2.jpg');

         // $quartzImage = file_get_contents($quartzImagePath);
         // $diamondImage = file_get_contents($diamondImagePath);


        // Dodanie kamieni przypisanych do użytkownika
        DB::table('rocks')->insert([
            [
                'title' => 'Quartz',
                'description' => 'A beautiful quartz crystal.',
                'main_mineral' => 'Quartz',
                'treatment' => 'Polished',
                'country_of_origin' => 'Brazil',
                'weight' => 2.5,
                'density' => 2.65,
                'color' => 'White',
                'clarity' => 'Transparent',
                'toughness' => 5.0,
                'rarity' => 'Common',
                'price' => 100.00,
                'user_id' => $userId, // Powiązanie z użytkownikiem
                // 'image' => $quartzImage,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Diamond',
                'description' => 'A rare diamond gem.',
                'main_mineral' => 'Diamond',
                'treatment' => 'None',
                'country_of_origin' => 'South Africa',
                'weight' => 0.75,
                'density' => 3.51,
                'color' => 'Clear',
                'clarity' => 'Flawless',
                'toughness' => 10.0,
                'rarity' => 'Rare',
                'price' => 5000.00,
                'user_id' => $userId, // Powiązanie z użytkownikiem
                // 'image' => $diamondImage,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

