<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $nidnList = DB::table('dosen')->pluck('nidn')->toArray();

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'npm' => str_pad($i + 1, 9, '0', STR_PAD_LEFT),
                'nidn' => $faker->randomElement($nidnList),
                'nama' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mahasiswa')->insert($data);
    }
}
    