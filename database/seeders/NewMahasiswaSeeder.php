<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewMahasiswaSeeder extends Seeder
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
                'Nim' => '1941720051',
                'Nama' => 'Tita',
                'Tanggal_Lahir' => '1998-01-26',
                'Kelas' => 'TI-4D',
                'Jurusan' => 'Teknologi Informasi',
                'Email' => 'wijayantitita094@gmail.com',
                'No_Handphone' => '081134789573'
            ],
            [
                'Nim' => '1941728904',
                'Nama' => 'Sulis',
                'Tanggal_Lahir' => '2000-08-25',
                'Kelas' => 'AB-2A',
                'Jurusan' => 'Administrasi Bisnis',
                'Email' => 'sulis123@gmail.com',
                'No_Handphone' => '085890346953'
            ],
            [
                'Nim' => '1941728900',
                'Nama' => 'Tina',
                'Tanggal_Lahir' => '2000-08-17',
                'Kelas' => 'AB-1B',
                'Jurusan' => 'Administrasi Bisnis',
                'Email' => 'tina1708@gmail.com',
                'No_Handphone' => '085890346953'
            ],
            [
                'Nim' => '1941720571',
                'Nama' => 'Solikha',
                'Tanggal_Lahir' => '2001-03-04',
                'Kelas' => 'AK-2G',
                'Jurusan' => 'Akuntansi',
                'Email' => 'solikha@gmail.com',
                'No_Handphone' => '088647389205'
            ]
        ]);
    }
}
