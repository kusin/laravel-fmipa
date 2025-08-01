<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mitra extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tb_mitra';

    protected $primaryKey = 'id_mitra';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [
        'id_mitra',
        'nama_mitra',
        'email_mitra',
        'telp_mitra',
        'nama_institusi',
        'alamat_institusi',
        'password',

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

    protected $hidden = [
        'password',
    ];

    public function hasilPengujian()
    {
        return $this->hasMany(HasilPengujian::class, 'id_mitra');
    }
}
