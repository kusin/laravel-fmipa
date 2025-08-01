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
        Schema::create('tb_jenis_pengujian', function (Blueprint $table) {
            // kolom table jenis pengujian
            $table->increments('id_jenis_pengujian');
            $table->string('nama_pengujian')->nullable()->default(null);
            $table->string('jenis_pengujian')->nullable()->default(null);
            $table->text('deskripsi_pengujian')->nullable()->default(null);
            $table->text('alat_pengujian')->nullable()->default(null);
            $table->string('jumlah_alat')->nullable()->default(null);
            $table->text('metode_pengujian')->nullable()->default(null);
            $table->string('waktu_pengujian')->nullable()->default(null);
            $table->text('keterangan_sampel')->nullable()->default(null);
            $table->decimal('biaya_pengujian', 15, 2)->nullable()->default(null);

            // kolom soft-delete
            $table->string('status_data')->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
        });

        // set collation menjadi mysql versi 8.0+
        // DB::statement("ALTER TABLE tb_jenis_pengujian CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_pengujian');
    }
};
