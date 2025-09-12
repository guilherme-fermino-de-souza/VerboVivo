<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'descricao' => fake()->text(200),
            'autor' => fake()->name(),
            'idioma' => fake()->randomElement(['Alemão', 'Espanhol', 'Francês', 'Inglês', 'Português']),
            'paisorigem' => fake()->country(),
            'anolancamento' => fake()->random_int(2, 2100),
            'preco' => fake()->randomFloat(2, 10, 750),
            'quantidade' => fake()->numberBetween(10, 2000),
            'image' => fake()->word(),
        ];
    }
}
