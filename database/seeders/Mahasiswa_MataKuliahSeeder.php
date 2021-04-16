<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa_MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mahasiswa_matakuliah = [
            [
                'mahasiswa_id' => '1941720050',
                'matakuliah_id' => '1',
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => '1941720050',
                'matakuliah_id' => '3',
                'nilai' => 'B+',
            ],
            [
                'mahasiswa_id' => '1941720051',
                'matakuliah_id' => '2',
                'nilai' => 'A',
            ],
            [
                'mahasiswa_id' => '1941720051',
                'matakuliah_id' => '4',
                'nilai' => 'B',
            ],
            [
                'mahasiswa_id' => '1941720571',
                'matakuliah_id' => '1',
                'nilai' => 'B',
            ]
        ];
        DB::table('mahasiswa_matakuliah')->insert($mahasiswa_matakuliah);
    }
}
