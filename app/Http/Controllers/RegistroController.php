<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Unidade;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'reitor') {
            $registros = Registro::with(['unidade', 'tipoRegistro'])->get();
        } else {
            $registros = Registro::with(['unidade', 'tipoRegistro'])
                ->where('unidade_id', $user->unidade_id)
                ->get();
        }

        // Separar patentes e marcas
        $patentesLocal = $registros->where('tipoRegistro_id', 1);
        $marcasLocal = $registros->where('tipoRegistro_id', 2);

        return view('loginSucesso', compact('patentesLocal', 'marcasLocal'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'numero_pedido'   => 'required|string|max:255',
            'titulo'          => 'required|string|max:255',
            'tipoRegistro_id' => 'required|in:1,2',
            'status'          => 'nullable|string|max:255',
        ];

        if ($user->role === 'reitor') {
            $rules['unidade_id'] = 'required|exists:unidades,id';
        }

        $data = $request->validate($rules);
        $data['status'] = $data['status'] ?? 'Em análise';
        $data['unidade_id'] = $user->role === 'reitor' ? $request->unidade_id : $user->unidade_id;

        Registro::create($data);

        return redirect()->route('login.sucesso')->with('success', 'Registro criado com sucesso!');
    }

    public function abrirPatente($numero)
    {
        $response = Http::withToken(session('token'))
                    ->get("http://nit.riodosul.ifc.edu.br:444/patente/{$numero}");

        if ($response->successful()) {
            $patente = $response->json();
            return view('patente', compact('patente'));
        }

        abort(404, 'Patente não encontrada.');
    }

    public function abrirMarca($numero)
    {
        $response = Http::withToken(session('token'))
                    ->get("http://nit.riodosul.ifc.edu.br:444/marca/{$numero}");

        if ($response->successful()) {
            $marca = $response->json();
            return view('marca', compact('marca'));
        }

        abort(404, 'Marca não encontrada.');
    }

    // Outros métodos CRUD omitidos para simplicidade...
}
