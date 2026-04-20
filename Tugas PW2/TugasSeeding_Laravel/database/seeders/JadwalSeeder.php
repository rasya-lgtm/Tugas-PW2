<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Mengambil data yang sudah ada dari tabel lain
        $daftarKode = DB::table('matakuliah')->pluck('kode_matakuliah')->toArray();
        $daftarDosen = DB::table('dosen')->pluck('nidn')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('jadwal')->insert([
                'hari'  => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
                // PENTING: Tambahkan :00 agar format jam lengkap Jam:Menit:Detik
                'jam'   => $faker->time('H:i') . ':00', 
                'kelas' => $faker->randomElement(['A', 'B', 'C', 'NR']),
                'kode_matakuliah' => $faker->randomElement($daftarKode), 
                'nidn'  => $faker->randomElement($daftarDosen),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}