<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Paciente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Paciente::create($request->all()))
        {
            return response()->json(['message'=>'Paciente cadastrado com sucesso!'], 201);
        }
        return response()->json(['message'=>'Erro ao cadastrar Paciente!'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $pacientes)
    {
        $pacientes = Paciente::find($pacientes);
        if($pacientes)
        {
            return $pacientes;
        }
        return response()->json(['message' => 'Paciente não encontrado!'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pacientes)
    {
        $pacientes = Paciente::find($pacientes);
        if($pacientes)
        {
            $pacientes->update($request->all());
            return $pacientes;
        }
        return response()->json(['message' => 'Erro ao atualizar Paciente!'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pacientes)
    {
        if(Paciente::destroy($pacientes))
        {
            return response()->json(['message'=>'Paciente deletado com sucesso!'], 200);
        }
        return response()->json(['message'=>'Erro ao deletar Paciente!'], 404);
    }
}
