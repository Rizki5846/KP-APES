<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggarans')->insert([
            [
                'nama_pelanggaran' => 'Tidak Membawa Buku',
                'id_sub_kategori' => 37, // Sesuaikan dengan id_sub_kategori yang ada
                'id_kat_pelanggaran' => 4, // Sesuaikan dengan id_kat_pelanggaran yang ada
                'poin' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_pelanggaran' => 'Terlambat Masuk Kelas',
                'id_sub_kategori' => 37,
                'id_kat_pelanggaran' => 3,
                'poin' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_pelanggaran' => 'Bolos Sekolah',
                'id_sub_kategori' => 37,
                'id_kat_pelanggaran' => 4,
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
