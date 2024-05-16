<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'kat_pelanggaran';
    protected $fillable = ['nama_kategori'];
}
