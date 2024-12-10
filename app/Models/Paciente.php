<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'cpf', 'sexo', 'data_nascimento', 'cep', 'municipio', 'estado',
        'bairro', 'logradouro', 'numero', 'complemento', 'email', 'telefone', 'celular'
    ];

    protected $dates = ['data_nascimento'];
}
