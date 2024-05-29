<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswas')->insert([
            [
                'nis' => 1234567890,
                'nama' => 'Budi Santoso',
                'th_angkatan' => 2020,
                'kelas' => '10A',
                'alamat' => 'Jl. Merdeka No. 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567891,
                'nama' => 'Siti Aminah',
                'th_angkatan' => 2020,
                'kelas' => '10B',
                'alamat' => 'Jl. Kebon Jeruk No. 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567892,
                'nama' => 'Ahmad Fauzi',
                'th_angkatan' => 2021,
                'kelas' => '11A',
                'alamat' => 'Jl. Anggrek No. 3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567893,
                'nama' => 'Dewi Lestari',
                'th_angkatan' => 2021,
                'kelas' => '11B',
                'alamat' => 'Jl. Mawar No. 4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567894,
                'nama' => 'Fajar Prasetyo',
                'th_angkatan' => 2019,
                'kelas' => '12A',
                'alamat' => 'Jl. Melati No. 5',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567895,
                'nama' => 'Gita Rahmawati',
                'th_angkatan' => 2019,
                'kelas' => '12B',
                'alamat' => 'Jl. Kemuning No. 6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567896,
                'nama' => 'Hendra Setiawan',
                'th_angkatan' => 2020,
                'kelas' => '10C',
                'alamat' => 'Jl. Dahlia No. 7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567897,
                'nama' => 'Intan Permatasari',
                'th_angkatan' => 2021,
                'kelas' => '11C',
                'alamat' => 'Jl. Flamboyan No. 8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567898,
                'nama' => 'Joko Susilo',
                'th_angkatan' => 2020,
                'kelas' => '10D',
                'alamat' => 'Jl. Teratai No. 9',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nis' => 1234567899,
                'nama' => 'Kartika Sari',
                'th_angkatan' => 2021,
                'kelas' => '11D',
                'alamat' => 'Jl. Tulip No. 10',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
