<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'nama_pelanggaran' => 'rambut panjang',
                'id_sub_kategori' => 6,
                'id_kat_pelanggaran' => 3,
                'poin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggaran' => 'membawa miras',
                'id_sub_kategori' => 5,
                'id_kat_pelanggaran' => 1,
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pelanggaran' => 'Pelanggaran B',
                'id_sub_kategori' => 2,
                'id_kat_pelanggaran' => 2,
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ]);
    }
}

