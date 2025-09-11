<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'cpf' => fake()->numerify('###.###.###-##'),
            'data_nascimento' => fake()->dateTimeBetween('-67 years', '-18')->format('Y-m-d'),
             'cep'  =>  null,
            'logradouro'  =>  null,
            'endereco'  =>  null,
            'rua'  =>  null,
            'bairro'  =>  null,
            'numero'  =>  null,
            'cidade'  =>  null,
            'estado'  =>  null,
            'complemento' =>  null,

            'tipo_usuario' => 2, // 2 = consumidor(o user padrão)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
