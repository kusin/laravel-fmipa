<?php

namespace Database\Seeders;

use App\Models\JenisPengujian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JenisPengujianSeeder extends Seeder
{
    public function run(): void
    {
        JenisPengujian::insert([
            [
                'nama_pengujian' => 'X-Ray Diffraction',
                'jenis_pengujian' => 'XRD',
                'deskripsi_pengujian' => 'Deskirpsi pengujian - lorem ipsum text',
                'alat_pengujian' => 'Alat pengujian - lorem ipsum text',
                'jumlah_alat' => '1 buah',
                'metode_pengujian' => 'Metode pengujian - lorem ipsum text',
                'waktu_pengujian' => '1 hari',
                'keterangan_sampel' => 'Keterangan sampel - lorem ipsum text',
                'biaya_pengujian' => '100000',
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pengujian' => 'X-Ray Fluorescence',
                'jenis_pengujian' => 'XRF',
                'deskripsi_pengujian' => 'Deskirpsi pengujian - lorem ipsum text',
                'alat_pengujian' => 'Alat pengujian - lorem ipsum text',
                'jumlah_alat' => '2 buah',
                'metode_pengujian' => 'Metode pengujian - lorem ipsum text',
                'waktu_pengujian' => '2 hari',
                'keterangan_sampel' => 'Keterangan sampel - lorem ipsum text',
                'biaya_pengujian' => '200000',
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pengujian' => 'Scanning Electron Microscopy – EDX',
                'jenis_pengujian' => 'SEM-EDX',
                'deskripsi_pengujian' => 'Deskirpsi pengujian - lorem ipsum text',
                'alat_pengujian' => 'Alat pengujian - lorem ipsum text',
                'jumlah_alat' => '3 buah',
                'metode_pengujian' => 'Metode pengujian - lorem ipsum text',
                'waktu_pengujian' => '3 hari',
                'keterangan_sampel' => 'Keterangan sampel - lorem ipsum text',
                'biaya_pengujian' => '300000',
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pengujian' => 'UV-Visible Spectroscopy',
                'jenis_pengujian' => 'UV-Vis',
                'deskripsi_pengujian' => 'Deskirpsi pengujian - lorem ipsum text',
                'alat_pengujian' => 'Alat pengujian - lorem ipsum text',
                'jumlah_alat' => '4 buah',
                'metode_pengujian' => 'Metode pengujian - lorem ipsum text',
                'waktu_pengujian' => '4 hari',
                'keterangan_sampel' => 'Keterangan sampel - lorem ipsum text',
                'biaya_pengujian' => '400000',
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'nama_pengujian' => 'Fourier Transform Infrared Spectroscopy',
                'jenis_pengujian' => 'FTIR',
                'deskripsi_pengujian' => 'Deskirpsi pengujian - lorem ipsum text',
                'alat_pengujian' => 'Alat pengujian - lorem ipsum text',
                'jumlah_alat' => '5 buah',
                'metode_pengujian' => 'Metode pengujian - lorem ipsum text',
                'waktu_pengujian' => '5 hari',
                'keterangan_sampel' => 'Keterangan sampel - lorem ipsum text',
                'biaya_pengujian' => '500000',
                'status_data' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
        ]);
    }
}
