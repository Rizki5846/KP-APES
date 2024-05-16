<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_kat_pelanggarans')->insert([
            ['nama_sub_kategori' => 'Belajar Mengajar', 'id_kat_pelanggaran' => 1],
            ['nama_sub_kategori' => 'Penghinaan', 'id_kat_pelanggaran' => 1],
            ['nama_sub_kategori' => 'Sarana Prasarana', 'id_kat_pelanggaran' => 1],
            ['nama_sub_kategori' => 'Memakai Perhiasan', 'id_kat_pelanggaran' => 1],
            ['nama_sub_kategori' => 'Rokok/ Miras/ Narkoba/ Petasan/ Pornografi', 'id_kat_pelanggaran' => 1],
            ['nama_sub_kategori' => 'Rambut', 'id_kat_pelanggaran' => 2],
            ['nama_sub_kategori' => 'Kehadiran', 'id_kat_pelanggaran' => 3],
        ]);
    }
}
