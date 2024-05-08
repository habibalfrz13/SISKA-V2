<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_kelas',
        'nama_peserta',
        'judul'
    ]; // Menentukan kolom yang dapat diisi secara massal

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi dengan model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function myclass()
    {
        return $this->hasMany(Myclass::class);
    }
}
