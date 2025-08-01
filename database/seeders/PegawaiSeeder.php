<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        //Pegawai::factory()->count(1)->create();
        Pegawai::insert([
            [
                'nama_pegawai' => 'Akhmad Futukhillah Fataba Alaih, S.Si., M.Si.',
                'email_pegawai' => 'akhmad.futukhillah@gmail.com',
                'telp_pegawai' => '0858-0677-3755',
                'keahlian' => 'Tenaga Ahli',
                'password' => Hash::make('12341234'),
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pegawai' => 'Rifqi Almusawi Rafsanjani, S.Si., M.Si.',
                'email_pegawai' => 'rifqi.almusawi@gmail.com',
                'telp_pegawai' => '0858-0677-3755',
                'keahlian' => 'Teknisi Laboran',
                'password' => Hash::make('12341234'),
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pegawai' => 'Aryajaya Alamsyah, S.Kom., M.Kom.',
                'email_pegawai' => 'aryajayaalamsyah@gmail.com',
                'telp_pegawai' => '0819-3285-5946',
                'keahlian' => 'Teknisi IT',
                'password' => Hash::make('12341234'),
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
        ]);
    }
}
