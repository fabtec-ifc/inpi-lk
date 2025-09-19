<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConsultaMarcaController extends Controller
{
    public function consultar(Request $request)
    {
        $filtro = $request->input('filtro');
        $token = session('token', 'SEU_TOKEN_AQUI');

        if (!$filtro) {
            return back()->with('error', 'Preencha todos os campos.');
        }

        $url = "http://200.135.58.39:5000/consultar/marca/{$filtro}";
        $response = Http::withToken($token)->get($url);

        if ($response->failed()) {
            return back()->with('error', 'Erro ao consultar: ' . $response->body());
        }

        $data = $response->json();

        if (!isset($data['detalhes'])) {
            return back()->with('error', 'Nenhum dado encontrado.')->with('raw', $data);
        }

        return view('Marca', ['detalhes' => $data['detalhes']]);
    }
}
?>
