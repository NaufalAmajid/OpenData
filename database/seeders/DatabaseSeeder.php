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
                'name'     => 'Nam Joo Seng',
                'username' => 'namjoo',
                'password' => Hash::make('123'),
                'kode_organisasi' => 'adm824302',
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185212',
                'name'     => 'Adinda Nur R',
                'username' => 'adinda',
                'password' => Hash::make('456'),
                'kode_organisasi' => 'bpad524013',
                'is_admin' => true,
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185213',
                'name'     => 'Kim Jong Un',
                'username' => 'kimjongun',
                'password' => Hash::make('321'),
                'kode_organisasi' => 'bkpdp62343',
            ]
        );
        User::create(
            [
                'kode_admin' => 'ADM20220617185214',
                'name'     => 'Tan Ah Kow',
                'username' => 'tanahkow',
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
