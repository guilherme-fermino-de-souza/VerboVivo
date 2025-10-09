<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'data_nascimento',
        'cep',
        'logradouro',
        'endereco',
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado',
        'complemento',
        'foto',
        'status_conta',
        'tipo_usuario',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'cpf',
        'data_nascimento',
        'cep',
        'logradouro',
        'endereco',
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado',
        'complemento',
        'status_conta',
        'tipo_usuario',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Relacionamentos
    public function admin()
    {
        return $this->hasOne(Admin::class, 'usuario_id');
    }

    public function consumidor()
    {
        return $this->hasOne(Consumidor::class, 'usuario_id');
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'usuario_id');
    }
}
