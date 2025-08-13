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
        Schema::create('tb_mitra', function (Blueprint $table) {
            // kolom table mitra
            $table->increments('id_mitra');
            $table->string('nik')->nullable()->default(null);
            $table->string('nama_mitra')->nullable()->default(null);
            $table->string('email_mitra')->nullable()->default(null);
            $table->string('telp_mitra')->nullable()->default(null);
            $table->string('nama_institusi')->nullable()->default(null);
            $table->string('alamat_institusi')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);

            // kolom soft-delete
            $table->string('status_data')->nullable()->default(null);
            $table->timestamp('created_at')->nullable()->default(null);
            $table->timestamp('updated_at')->nullable()->default(null);
            $table->timestamp('deleted_at')->nullable()->default(null);
        });

        // set collation menjadi mysql versi 8.0+
        // DB::statement("ALTER TABLE tb_mitra CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mitra');
    }
};
