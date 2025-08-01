<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HasilPengujian extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tb_hasil_pengujian';

    protected $primaryKey = 'id_hasil_pengujian';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [

        // kolom table hasil pengujian (pk dan fk)
        'id_mitra',
        'id_jenis_pengujian',

        // kolom table hasil pengujian - Pendaftaran
        'tanggal_pendaftaran',
        'status_pendaftaran',

        // kolom table hasil pengujian - Sampel
        'tanggal_sampel',
        'jenis_sampel',
        'qty_sampel',
        'status_sampel',

        // kolom table hasil pengujian - Pengujian
        'tanggal_pengujian_mulai',
        'tanggal_pengujian_selesai',
        'status_verifikasi',
        'status_pengujian',

        // kolom table hasil pengujian - Invoice
        'tanggal_invoice',
        'nomor_invoice_internal',
        'nomor_invoice_eksternal',
        'status_invoice',

        // kolom table hasil pengujian - Pembayaran
        'tanggal_pembayaran',
        'metode_pembayaran',
        'nominal_pembayaran',
        'status_pembayaran',

        // kolom table hasil pengujian - Kwitansi
        'tanggal_kwitansi',
        'nomor_kwitansi_internal',
        'nomor_kwitansi_eksternal',
        'status_kwitansi',

        // kolom soft-delete
        'file_hasil_pengujian',
        'keterangan',
        'status_data',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $casts = [
        'tanggal_pendaftaran' => 'datetime',
        'tanggal_sampel' => 'datetime',
        'tanggal_pengujian_mulai' => 'datetime',
        'tanggal_pengujian_selesai' => 'datetime',
        'tanggal_invoice' => 'datetime',
        'tanggal_pembayaran' => 'datetime',
        'tanggal_kwitansi' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }

    public function jenisPengujian()
    {
        return $this->belongsTo(JenisPengujian::class, 'id_jenis_pengujian');
    }
}
