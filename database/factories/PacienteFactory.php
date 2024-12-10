<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = Paciente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'          => $this->faker->name,  // Nome completo
            'cpf'           => $this->faker->unique()->numerify('###.###.###-##'), // CPF formatado
            'sexo'          => $this->faker->randomElement(['M', 'F']),  // Sexo (M ou F)
            'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'), // Data de nascimento
            'cep'           => $this->faker->numerify('#####-###'), // CEP formatado
            'municipio'     => $this->faker->city, // Cidade
            'estado'        => $this->faker->randomElement(['RO', 'AM']), // Sigla do estado (UF)
            'bairro'        => $this->faker->word, // Bairro
            'logradouro'    => $this->faker->streetName, // Logradouro
            'numero'        => $this->faker->buildingNumber, // Número da casa
            'complemento'   => $this->faker->optional()->word, // Complemento (opcional)
            'email'         => $this->faker->unique()->safeEmail, // E-mail
            'telefone'      => $this->faker->numerify('(69) #####-####'), // Telefone fixo
            'celular'       => $this->faker->numerify('(69) #####-####'), // Celular
        ];
    }
}
