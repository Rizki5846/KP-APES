<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kat_pelanggaran')->insert([
            ['nama_kategori' => 'Komponen Kelakuan'],
            ['nama_kategori' => 'Komponen Kerajinan'],
            ['nama_kategori' => 'Komponen Kerapihan'],
          
        ]);
    }
}
