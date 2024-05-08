<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kuota',
        'pelaksanaan',
        'status',
        'kategori',
        'foto',
        'harga',
        'deskripsi',
    ];

    public function relasis()
    {
        return $this->hasMany(Myclass::class);
    }
}
