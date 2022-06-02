<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Seeder;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create a organisasi
        Organisasi::create(
            [
                'kode_organisasi' => 'bpad524013',
                'deskripsi' => '-',
                'nama_organisasi' => 'Badan Pengelolaan Aset Daerah',
            ],
        );

        Organisasi::create(
            [
                'kode_organisasi' => 'bkpdp62343',
                'deskripsi' => '-',
                'nama_organisasi' => 'Badan Kepegawaian, Pendidikan Dan Pelatihan',
            ]
        );

        Organisasi::create(
            [
                'kode_organisasi' => 'dadp824302',
                'deskripsi' => '-',
                'nama_organisasi' => 'Dinas Arsip Dan Perpustakaan',
            ]
        );

        Organisasi::create(
            [
                'kode_organisasi' => 'bpppdpd824',
                'deskripsi' => '-',
                'nama_organisasi' => 'Badan Perencanaan Pembangunan, Penelitian Dan Pengembangan Daerah',
            ]
        );

        Organisasi::create(
            [
                'kode_organisasi' => 'bppd572340',
                'deskripsi' => '-',
                'nama_organisasi' => 'Badan Pengelolaan Pendapatan Daerah',
            ]
        );
    }
}
