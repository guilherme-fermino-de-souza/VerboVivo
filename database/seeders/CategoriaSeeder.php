<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Romance Contemporâneo',
            'Romance Histórico',
            'Fantasia',
            'Ficção Científica',
            'Mistério e Suspense',
            'Terror e Horror',
            'Distopia',
            'Clássicos da Literatura',
            'Contos e Crônicas',
            'Ficção Policial',
            'Biografias e Memórias',
            'Autoajuda e Desenvolvimento Pessoal',
            'Negócios e Empreendedorismo',
            'História Geral',
            'Filosofia',
            'Psicologia',
            'Espiritualidade e Religião',
            'Ciência e Tecnologia',
            'Política e Sociedade',
            'Educação e Pedagogia',
            'Literatura Infantil (0-6 anos)',
            'Infantojuvenil (7-12 anos)',
            'Jovem Adulto (YA)',
            'Mangás e Quadrinhos',
            'Contos de Fadas e Folclore',
            'Gastronomia e Culinária',
            'Viagem e Turismo',
            'Saúde e Bem-estar',
            'Arte, Fotografia e Design',
            'Poesia',
        ];

        foreach ($categorias as $nome) {
            Categoria::create(['categoria' => $nome]);
        }
    }
}
