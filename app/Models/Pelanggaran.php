<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubKatPelanggaran;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggarans';

    protected $fillable = ['nama_pelanggaran', 'id_sub_kategori', 'id_kat_pelanggaran', 'poin'];

    // Define the relationship with the SubKatPelanggaran model
    public function subKategori()
    {
        return $this->belongsTo(SubKatPelanggaran::class, 'id_sub_kategori');
    }
    public function katPelanggaran()
    {
        return $this->belongsTo(KatPelanggaran::class, 'id_kat_pelanggaran');
    }
}
