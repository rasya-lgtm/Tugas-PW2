<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('Id_ID');
        $NamaDosen = [
                    'Dr. Andi Pratama, S.Kom., M.Kom.',
                    'Dr. Budi Santoso, S.T., M.T.',
                    'Dr. Citra Lestari, S.Kom., M.Kom.',
                    'Dr. Dedi Kurniawan, S.T., M.T.',
                    'Dr. Eka Wulandari, S.Kom., M.Kom.',
                    'Dr. Fajar Nugroho, S.T., M.T.',
                    'Dr. Gita Permata, S.Kom., M.Kom.,',
                    'Dr. Hadi Saputra, S.T., M.T.',
                    'Dr. Indah Puspita, S.Kom., M.Kom.',
                    'Dr. Joko Susilo, S.T., M.T.'
        ];

        $data = [];
        foreach ($NamaDosen as $index => $nama) {
            $data[] = [
                'nidn' => 'D' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'nama' => $nama,
                'created_at' => now(),
                'updated_at' => now(),
            ];

        }

        DB::table('dosen')->insert($data);
        // DB::table('table_buku')->delete();
    }
}
