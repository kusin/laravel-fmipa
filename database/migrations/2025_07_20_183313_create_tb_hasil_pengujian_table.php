<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_hasil_pengujian', function (Blueprint $table) {

            // kolom table hasil pengujian (pk dan fk)
            $table->increments('id_hasil_pengujian');
            $table->unsignedInteger('id_mitra');
            $table->unsignedInteger('id_jenis_pengujian');

            // kolom table hasil pengujian - Pendaftaran
            $table->timestamp('tanggal_pendaftaran')->nullable()->default(null);
            $table->string('status_pendaftaran')->nullable()->default(null);
            //$table->string('status_pendaftaran')->default('Belum Disetujui'); // Sudah Disetujui atau Belum Disetujui

            // kolom table hasil pengujian - Sampel
            $table->timestamp('tanggal_sampel')->nullable()->default(null);
            $table->string('jenis_sampel')->nullable()->default(null);
            $table->string('qty_sampel')->nullable()->default(null);
            $table->string('status_sampel')->nullable()->default(null);
            //$table->string('status_sampel')->default('Belum Dikirim'); // Sudah Dikirim, Sedang Dikirim, Belum Dikirim

            // kolom table hasil pengujian - Pengujian
            $table->timestamp('tanggal_pengujian_mulai')->nullable()->default(null);
            $table->timestamp('tanggal_pengujian_selesai')->nullable()->default(null);
            $table->string('status_verifikasi')->nullable()->default(null);
            $table->string('status_pengujian')->nullable()->default(null);
            // $table->string('status_verifikasi')->default('Belum Diverifikasi'); // Sudah Diverifikasi, Sedang Diverifikasi, Belum Diverifikasi
            // $table->string('status_pengujian')->default('Belum Selesai'); // Belum Selesai, Sedang Proses, Belum Selesai

            // kolom table hasil pengujian - Invoice
            $table->timestamp('tanggal_invoice')->nullable()->default(null);
            $table->string('nomor_invoice_internal')->nullable()->default(null);
            $table->string('nomor_invoice_eksternal')->nullable()->default(null);
            $table->string('status_invoice')->nullable()->default(null);
            //$table->string('status_invoice')->default('Belum Diberikan'); // Sudah Diberikan, Sedang Proses, Belum Diberikan

            // kolom table hasil pengujian - Pembayaran
            $table->timestamp('tanggal_pembayaran')->nullable()->default(null);
            $table->string('metode_pembayaran')->nullable()->default(null);
            $table->decimal('nominal_pembayaran', 15, 2)->nullable()->default(null);
            $table->string('status_pembayaran')->nullable()->default(null);
            // $table->string('metode_pembayaran')->default('Transfer Bank'); // Transfer Bank, Cash, QRIS
            // $table->string('status_pembayaran')->default('Belum Dibayar'); // Sudah Dibayar, Sedang Bayar, Belum Dibayar=

            // kolom table hasil pengujian - Kwitansi
            $table->timestamp('tanggal_kwitansi')->nullable()->default(null);
            $table->string('nomor_kwitansi_internal')->nullable()->default(null);
            $table->string('nomor_kwitansi_eksternal')->nullable()->default(null);
            $table->string('status_kwitansi')->nullable()->default(null); // Sudah Diberikan, Sedang Proses, Belum Diberikan
            //$table->string('status_kwitansi')->default('Belum Diberikan'); // Sudah Diberikan, Sedang Proses, Belum Diberikan

            // kolom hasil pengujian
            $table->text('file_hasil_pengujian')->nullable()->default(null);
            $table->text('keterangan')->nullable()->default(null);

            // Soft delete
            $table->string('status_data')->default('Aktif'); // Aktif, Tidak Aktif
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);

            // Relasi foreign key
            $table->foreign('id_mitra')->references('id_mitra')->on('tb_mitra')->onDelete('cascade');
            $table->foreign('id_jenis_pengujian')->references('id_jenis_pengujian')->on('tb_jenis_pengujian')->onDelete('cascade');
        });

        // set collation menjadi mysql versi 8.0+
        // DB::statement("ALTER TABLE tb_hasil_pengujian CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hasil_pengujian');
    }
};
