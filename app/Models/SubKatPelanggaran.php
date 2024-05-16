<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKatPelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sub_kategori',
        'id_kat_pelanggaran'
    ];
}
