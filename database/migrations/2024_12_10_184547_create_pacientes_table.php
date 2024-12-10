<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Campo nome
            $table->string('cpf')->unique(); // Campo CPF (único)
            $table->enum('sexo', ['M', 'F']); // Campo sexo (M = masculino, F = feminino, Outro = outros)
            $table->date('data_nascimento'); // Campo data de nascimento
            $table->string('cep'); // Campo CEP
            $table->string('municipio'); // Campo município
            $table->string('estado'); // Campo estado
            $table->string('bairro'); // Campo bairro
            $table->string('logradouro'); // Campo logradouro
            $table->string('numero'); // Campo número
            $table->string('complemento')->nullable(); // Campo complemento (opcional)
            $table->string('email')->unique()->nullable(); // Campo email (opcional e único)
            $table->string('telefone')->nullable(); // Campo telefone (opcional)
            $table->string('celular')->nullable(); // Campo celular (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
