<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $namaMatkul = [
            'Algoritma Pemrograman', 'Basis Data', 'Pemrograman Web',
            'Jaringan Komputer', 'Sistem Operasi', 'Rekayasa Perangkat Lunak',
            'Kecerdasan Buatan', 'Etika Profesi', 'Struktur Data', 'Arsitektur Komputer'
        ];

        foreach ($namaMatkul as $nama) {
            DB::table('matakuliah')->insert([
                'kode_matakuliah' => 'MK-' . $faker->unique()->numerify('###'),
                'nama_matakuliah' => $nama,
                'sks'             => $faker->randomElement([2, 3, 4]), // Wajib ada biar gak error
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}