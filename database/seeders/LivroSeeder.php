<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Categoria;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = Categoria::all();

        Livro::factory(50)->create()->each(function ($livro) use ($categorias) {
            $livro->categorias()->attach(
                $categorias->random(rand(4, 15))->pluck('id')->toArray()
            );
        });
    }
}
