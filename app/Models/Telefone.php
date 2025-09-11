<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    protected $table = 'telefones';

    public $fillable = [
        'id',
        'usuario_id',
        'numero_telefone'
    ];

    public function Usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
