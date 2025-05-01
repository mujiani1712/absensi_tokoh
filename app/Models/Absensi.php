<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    use HasFactory;
    protected $table = 'absens'; 

    protected $fillable = [
        
        'user_id',
        'tipe',
        'foto',
        'lokasi',
        'jam',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
