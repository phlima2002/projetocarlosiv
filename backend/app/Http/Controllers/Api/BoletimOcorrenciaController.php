<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoletimOcorrencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoletimOcorrenciaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validar os dados (esperando snake_case)
        $validator = Validator::make($request->all(), [
            // Comunicante
            'comunicante_nome' => 'required|string|max:255',
            'comunicante_data_nasc' => 'required|date',
            'comunicante_cpf' => 'required|string|max:20',
            'comunicante_endereco' => 'required|string',
            'comunicante_telefone' => 'required|string|max:20',

            // Fato
            'fato_data' => 'required|date',
            'fato_hora' => 'required',
            'fato_local' => 'required|string',
            'fato_descricao' => 'required|string',

            // Testemunhas
            'houve_testemunhas' => 'required|string',
            'testemunhas_info' => 'nullable|string', 

            // Agressor
            'agressor_nome' => 'nullable|string|max:255',
            'agressor_vinculo' => 'nullable|string|max:255',
            'agressor_descricao' => 'nullable|string',

            // Medidas Protetivas
            // --- MUDANÇA AQUI ---
            // Alterado de 'json' para 'array' para corresponder ao Model.
            'medidas_protetivas' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $boletim = BoletimOcorrencia::create($request->all());

        return response()->json([
            'message' => 'Boletim de Ocorrência registrado com sucesso!',
            'data' => $boletim
        ], 201);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boletins = BoletimOcorrencia::orderBy('created_at', 'desc')->get();
        return response()->json($boletins);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $boletim = BoletimOcorrencia::find($id);

        if (!$boletim) {
            return response()->json(['message' => 'Boletim não encontrado'], 404);
        }

        $boletim->delete();

        return response()->json(null, 204);
    }
}
