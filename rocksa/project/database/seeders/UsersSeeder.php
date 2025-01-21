<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'szubamaolbrzymiego',
            'email' => 'SzubaMaOlbrzymiego@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
