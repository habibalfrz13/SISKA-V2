<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myclass extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'id_user',
        'id_kelas',
        'status',
        'foto',
    ];

    public function test()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

}
