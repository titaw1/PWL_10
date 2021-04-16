<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Mahasiswa::insert([
            [
                'Nim' => '1941720053',
                'Nama' => 'Tita Wijayanti',
                'Kelas' => 'TI-2C',
                'Jurusan' => 'Teknologi Informasi',
                'No_Handphone' => '081134789573'
            ],
            [
                'Nim' => '1941720578',
                'Nama' => 'MakrifatuL Solikha',
                'Kelas' => 'TM-2D',
                'Jurusan' => 'Teknik Mesin',
                'No_Handphone' => '088647389205'
            ],
            [
                'Nim' => '1941728905',
                'Nama' => 'Sulistyaningsih',
                'Kelas' => 'AB-2E',
                'Jurusan' => 'Administrasi Bisnis',
                'No_Handphone' => '085890346953'
            ]
        ]);
    }
}
