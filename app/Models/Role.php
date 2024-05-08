<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
    ];

    public function down()
    {
        Schema::dropIfExists('roles');
    }
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
