<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Lionel Messi',
                'email' => 'messi@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cristiano Ronaldo',
                'email' => 'ronaldo@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Neymar Jr',
                'email' => 'neymar@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kylian Mbappé',
                'email' => 'mbappe@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kevin De Bruyne',
                'email' => 'debruyne@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mohamed Salah',
                'email' => 'salah@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Robert Lewandowski',
                'email' => 'lewandowski@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Virgil van Dijk',
                'email' => 'vandijk@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sergio Ramos',
                'email' => 'ramos@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luka Modric',
                'email' => 'modric@example.com',
                'password' => Hash::make('123456789'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

/*
    ! php artisan db:seed

*/