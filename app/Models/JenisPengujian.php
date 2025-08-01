<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPengujian extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tb_jenis_pengujian';

    protected $primaryKey = 'id_jenis_pengujian';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [
        'id_jenis_pengujian',
        'nama_pengujian',
        'jenis_pengujian',
        'deskripsi_pengujian',
        'alat_pengujian',
        'jumlah_alat',
        'metode_pengujian',
        'waktu_pengujian',
        'keterangan_sampel',
        'biaya_pengujian',
        'status_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function hasilPengujian()
    {
        return $this->hasMany(HasilPengujian::class, 'id_jenis_pengujian');
    }
}
