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
    }
}

