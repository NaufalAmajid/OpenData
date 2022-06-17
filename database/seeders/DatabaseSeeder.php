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
                'kode_admin' => 'ADM20220617185211',
                'name'     => 'Naufal Amajid',
                'username' => 'naufal',
                'password' => Hash::make('123'),
                'kode_organisasi' => 'adm824302',
                'is_admin' => true,
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185212',
                'name'     => 'Adinda Nur R',
                'username' => 'adinda',
                'password' => Hash::make('456'),
                'kode_organisasi' => 'bpad524013',
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185213',
                'name'     => 'Naruto Uzumaki',
                'username' => 'naruto',
                'password' => Hash::make('321'),
                'kode_organisasi' => 'bkpdp62343',
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185214',
                'name'     => 'Sasuke Uchiha',
                'username' => 'sasuke',
                'password' => Hash::make('654'),
                'kode_organisasi' => 'bpppdpd824',
            ]
        );

        // Call Class To Seed Data
        $this->call([
            OrganisasiSeeder::class,
            SektoralSeeder::class,
            TagSeeder::class,
            // DatasetSeeder::class,
        ]);

    }
}
