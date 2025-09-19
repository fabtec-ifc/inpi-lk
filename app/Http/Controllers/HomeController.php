<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Registro;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // usuário logado
        $token = session('token', 'SEU_TOKEN_AQUI'); // token da API
        $unidadeId = $user->unidade_id ?? null; // ou outro identificador da conta IFC

        // ----------------------
        // Buscar do BANCO LOCAL
        // ----------------------
        $patentesLocal = Registro::where('tipoRegistro_id', 1)->get();
        $marcasLocal   = Registro::where('tipoRegistro_id', 2)->get();

        // ----------------------
        // Buscar da API EXTERNA
        // ----------------------
        $patentesApi = collect();
        $marcasApi   = collect();

        if ($unidadeId) {
            // Patentes
            $urlPatentes = "http://200.135.58.39:5000/consultar/patente/unidade/{$unidadeId}";
            $responsePatentes = Http::withToken($token)->get($urlPatentes);
            if ($responsePatentes->successful()) {
                $patentesApi = collect($responsePatentes->json()['detalhes'] ?? []);
            }

            // Marcas
            $urlMarcas = "http://200.135.58.39:5000/consultar/marca/unidade/{$unidadeId}";
            $responseMarcas = Http::withToken($token)->get($urlMarcas);
            if ($responseMarcas->successful()) {
                $marcasApi = collect($responseMarcas->json()['detalhes'] ?? []);
            }
        }

        // ----------------------
        // Retorna para a view
        // ----------------------
        return view('loginSucesso', [
            'patentesLocal' => $patentesLocal,
            'marcasLocal'   => $marcasLocal,
            'patentesApi'   => $patentesApi,
            'marcasApi'     => $marcasApi,
        ]);
    }
}
