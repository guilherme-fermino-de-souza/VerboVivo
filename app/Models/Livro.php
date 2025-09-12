<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = "livros";

    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'idioma',
        'paisorigem',
        'anolancamento',
        'preco',
        'quantidade',
        'image',
    ];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_livro');
    }
}
