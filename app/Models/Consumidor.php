<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumidor extends Model
{
    use HasFactory;

    protected $table = "consumidores";

    protected $fillable = [
        'usuario_id',
    ];

    public function Usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
