<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas_id',
        'nama_peserta',
        'judul'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function myClasses()
    {
        return $this->hasMany(Myclass::class);
    }
}
