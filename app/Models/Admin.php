<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admins";

    protected $fillable = [
        'usuario_id',
    ];

    public function Usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
