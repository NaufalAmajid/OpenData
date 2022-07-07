<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CREATE TAGS
        Tags::create([
            'kode_tag' => rand(1, 100) . Str::random(5),
            'nama_tag' => 'Pendidikan',
            'created_at' => now(),
            'updated_at' => now(),
            'pembuat' => 'ADM20220617185211',
        ]);

        Tags::create([
            'kode_tag' => rand(1, 100) . Str::random(5),
            'nama_tag' => 'Aset Desa',
            'created_at' => now(),
            'updated_at' => now(),
            'pembuat' => 'ADM20220617185212',
        ]);

        Tags::create([
            'kode_tag' => rand(1, 100) . Str::random(5),
            'nama_tag' => 'Data Umum Kecamatan',
            'created_at' => now(),
            'updated_at' => now(),
            'pembuat' => 'ADM20220617185213',
        ]);

        Tags::create([
            'kode_tag' => rand(1, 100) . Str::random(5),
            'nama_tag' => 'Jumlah Tempat Ibadah',
            'created_at' => now(),
            'updated_at' => now(),
            'pembuat' => 'ADM20220617185211',
        ]);

        Tags::create([
            'kode_tag' => rand(1, 100) . Str::random(5),
            'nama_tag' => 'Status Desa',
            'created_at' => now(),
            'updated_at' => now(),
            'pembuat' => 'ADM20220617185212',
        ]);
    }
}
