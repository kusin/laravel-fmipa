<?php

namespace Database\Factories;

use App\Models\Mitra;
use App\Models\JenisPengujian;
use App\Models\HasilPengujian;
use Illuminate\Database\Eloquent\Factories\Factory;

class HasilPengujianFactory extends Factory
{
    public function definition(): array
    {
        $mitra = Mitra::inRandomOrder()->first();

        $jenisPengujian = JenisPengujian::inRandomOrder()->first();

        $jenis_sampel = [
            'Padatan - Plat',
            'Padatan - Powder',
            'Cair atau Liquid',
        ];

        $qty_sampel = fake()->numberBetween(1, 5);

        $nominal_pembayaran = $jenisPengujian->biaya_pengujian * $qty_sampel;

        return [

            // Relasi Mitra, Jenis Pengujian dan Hasil Pengujian.
            'id_mitra' => $mitra->id_mitra,
            'id_jenis_pengujian' => $jenisPengujian->id_jenis_pengujian,

            // Pendaftaran (mitra baru daftar)
            'tanggal_pendaftaran' => now(),
            'status_pendaftaran' => 'Belum Disetujui',

            // Sampel (belum kirim sampel)
            'tanggal_sampel' => null,
            'jenis_sampel' => fake()->randomElement($jenis_sampel),
            'qty_sampel' => $qty_sampel,
            'status_sampel' => 'Belum Dikirim',

            // Pengujian (belum pengujian)
            'tanggal_pengujian_mulai' => null,
            'tanggal_pengujian_selesai' => null,
            'status_verifikasi' => 'Belum Diverifikasi',
            'status_pengujian' => 'Belum Selesai',

            // Invoice (belum invoice)
            'tanggal_invoice' => null,
            'nomor_invoice_internal' => null,
            'nomor_invoice_eksternal' => null,
            'status_invoice' => 'Belum Diberikan',

            // Pembayaran (belum bayar)
            'tanggal_pembayaran' => null,
            'metode_pembayaran' => null,
            'nominal_pembayaran' => $nominal_pembayaran,
            'status_pembayaran' => 'Belum Dibayar',

            // Kwitansi (belum kwitansi)
            'tanggal_kwitansi' => null,
            'nomor_kwitansi_internal' => null,
            'nomor_kwitansi_eksternal' => null,
            'status_kwitansi' => 'Belum Diberikan',

            // Soft delete dan keterangan
            'file_hasil_pengujian' => null,
            'keterangan' => null,
            'status_data' => 'Aktif',

            // timestamps
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
