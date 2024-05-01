<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [];

        // // Buat larik data pengguna
        // for ($i = 0; $i < 10; $i++) {
        //     $users[] = [
        //         'name' => Str::random(10),
        //         'email' => Str::random(10) . '@example.com',
        //         'password' => Hash::make('password'),
        //     ];
        // }

        // // Sisipkan larik data pengguna ke dalam tabel 'users'
        // DB::table('users')->insert($users);

        DB::table('users')->insert([
            [
                'name' => 'M. Azra Dwi Rizky',
                'email' => 'azra@example.com',
                'password' => Hash::make('azra'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],

        ]);
    }
}
