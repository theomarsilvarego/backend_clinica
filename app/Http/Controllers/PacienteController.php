<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="API de Pacientes", version="1.0")
 * @OA\Schema(
 * schema="Paciente",
 * type="object",
 * required={"nome", "cpf", "sexo", "data_nascimento", "cep", "municipio", "estado", "bairro", "logradouro", "numero", "email", "telefone", "celular"},
 * @OA\Property(property="id", type="integer", description="ID do paciente", example=1),
 * @OA\Property(property="nome", type="string", description="Nome do paciente", example="João da Silva"),
 * @OA\Property(property="cpf", type="string", description="CPF do paciente", example="123.456.789-00"),
 * @OA\Property(property="sexo", type="string", description="Sexo do paciente", example="M"),
 * @OA\Property(property="data_nascimento", type="string", format="date", description="Data de nascimento", example="1980-10-10"),
 * @OA\Property(property="cep", type="string", description="CEP do paciente", example="12345-678"),
 * @OA\Property(property="municipio", type="string", description="Cidade do paciente", example="Porto Velho"),
 * @OA\Property(property="estado", type="string", description="Estado do paciente", example="RO"),
 * @OA\Property(property="bairro", type="string", description="Bairro do paciente", example="Centro"),
 * @OA\Property(property="logradouro", type="string", description="Logradouro do paciente", example="Rua A"),
 * @OA\Property(property="numero", type="string", description="Número da casa", example="123"),
 * @OA\Property(property="complemento", type="string", description="Complemento", example="Apto 10"),
 * @OA\Property(property="email", type="string", description="Email do paciente", example="joao@exemplo.com"),
 * @OA\Property(property="telefone", type="string", description="Telefone fixo", example="(69) 1234-5678"),
 * @OA\Property(property="celular", type="string", description="Número de celular", example="(69) 98765-4321")
 * )
 */
class PacienteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pacientes",
     *     summary="Listar todos os pacientes",
     *     tags={"Paciente"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de pacientes",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Paciente"))
     *     )
     * )
     */
    public function index()
    {
        return Paciente::all();
    }

    /**
     * @OA\Post(
     *     path="/api/pacientes",
     *     summary="Criar um novo paciente",
     *     tags={"Paciente"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Paciente criado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos"
     *     )
     * )
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
     * @OA\Get(
     *     path="/api/pacientes/{id}",
     *     summary="Retornar um paciente específico",
     *     tags={"Paciente"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente encontrado",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Paciente não encontrado"
     *     )
     * )
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
     * @OA\Put(
     *     path="/api/pacientes/{id}",
     *     summary="Atualizar um paciente",
     *     tags={"Paciente"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Paciente atualizado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Paciente")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Dados inválidos"
     *     )
     * )
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
     * @OA\Delete(
     *     path="/api/pacientes/{id}",
     *     summary="Deletar um paciente",
     *     tags={"Paciente"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do paciente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Paciente deletado com sucesso"
     *     )
     * )
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
