<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DenunciaRapida; // <-- Importamos o Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // <-- Importamos o Validador

class DenunciaRapidaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * (Salva uma nova denúncia rápida)
     */
    public function store(Request $request)
    {
        // 1. Validar os dados que chegam
        // Isso garante que campos obrigatórios vieram e têm o tipo certo
        $validator = Validator::make($request->all(), [
            'data_hora' => 'required|date',
            'tipo_violencia' => 'required|string|max:255',
            'e_a_vitima' => 'required|string',
            'agressor_armado' => 'required|string',
            'localizacao' => 'required|string',
            'vinculo_agressor' => 'required|string|max:255',
            'genero_agressor' => 'required|string|max:255',
            'descricao_agressor' => 'required|string',
        ]);
        

        // 2. Se a validação falhar, retorna um erro 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Se passou na validação, cria a denúncia
        // Usamos $request->all() porque definimos o $fillable no Model
        $denuncia = DenunciaRapida::create($request->all());

        // 4. Retorna uma resposta de sucesso (201 - Created)
        return response()->json([
            'message' => 'Denúncia rápida registrada com sucesso!',
            'data' => $denuncia
        ], 201);
    }

    public function index()
    {
        // Busca todas as denúncias, ordenadas pela mais recente
        $denuncias = DenunciaRapida::orderBy('created_at', 'desc')->get();
        return response()->json($denuncias);
    }

    /**
     * Remove the specified resource from storage.
     * (Deleta uma denúncia rápida específica)
     */
    public function destroy(string $id)
    {
        $denuncia = DenunciaRapida::find($id);

        if (!$denuncia) {
            return response()->json(['message' => 'Denúncia não encontrada'], 404);
        }

        $denuncia->delete();

        // 204 No Content é a resposta padrão para um DELETE bem-sucedido
        return response()->json(null, 204);
    }

    // (Vamos ignorar os outros métodos como index, show, update, destroy por enquanto)
}