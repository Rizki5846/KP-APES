<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas'; // Specify the table name if it's different from the default naming convention
    protected $fillable = [
        'nis',
        'nama',
        'th_angkatan',
        'kelas',
        'alamat'
    ];
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    public function detailPoins()
    {
        return $this->hasMany(InputPelanggaran::class, 'nis', 'nis');
    }
}
