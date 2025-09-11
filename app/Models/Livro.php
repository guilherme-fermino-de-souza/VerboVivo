<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'idioma',
        'paisorigem',
        'anolancamento',
        'preco',
        'quantidade',
        'name',
        'size',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_livro');
    }
}
