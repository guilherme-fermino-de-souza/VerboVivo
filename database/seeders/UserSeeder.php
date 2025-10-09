<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Consumidor;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@site.com',
            'password' => Hash::make('123456'),
            'status_conta' => 1,
            'tipo_usuario' => 1,
            'foto' => 'Images/perfil/perfil-1.jpg'
        ]);

        $consumidor = User::factory()->create([
            'name' => 'consumidor',
            'email' => 'consumidor@site.com',
            'password' => Hash::make('123456'),
            'status_conta' => 1,
            'tipo_usuario' => 2,
            'foto' => 'Images/perfil/perfil-2.jpg'
        ]);

        Admin::factory()->create([
            'usuario_id' => $admin->id,
        ]);

        Consumidor::factory()->create([
            'usuario_id' => $consumidor->id,
        ]);
    }
}
