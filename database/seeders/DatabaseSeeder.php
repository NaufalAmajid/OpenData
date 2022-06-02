<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Create a user
        User::create(
            [
                'name'     => 'Naufal Amajid',
                'username' => 'naufal',
                'password' => Hash::make('123'),
            ]
        );
        User::create(
            [
                'name'     => 'Adinda Nur R',
                'username' => 'adinda',
                'password' => Hash::make('456'),
            ]
        );

        // Call Class To Seed Data
        $this->call([
            OrganisasiSeeder::class,
            SektoralSeeder::class,
            // DatasetSeeder::class,
        ]);

    }
}
