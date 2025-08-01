<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tb_pegawai';

    protected $primaryKey = 'id_pegawai';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [
        'nama_pegawai',
        'email_pegawai',
        'telp_pegawai',
        'keahlian',
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
}
