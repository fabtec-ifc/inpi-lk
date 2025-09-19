<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    // Lista todos os registros (dashboard)
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

        return view('login.sucesso', compact('registros'));
    }

    // Formulário de criação
    public function create()
    {
        $user = Auth::user();

        // Todos os usuários recebem as unidades, mas apenas reitor poderá alterar
        $unidades = Unidade::all();

        return view('registros.create', compact('unidades'));
    }

    // Armazena um novo registro
    public function store(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'numero_pedido'   => 'required|string|max:255',
            'titulo'          => 'required|string|max:255',
            'tipoRegistro_id' => 'required|in:1,2',
            'status'          => 'nullable|string|max:255',
        ];

        // Somente reitor precisa validar unidade selecionada
        if ($user->role === 'reitor') {
            $rules['unidade_id'] = 'required|exists:unidades,id';
        }

        $data = $request->validate($rules);

        $data['status'] = $data['status'] ?? 'Em análise';
        $data['unidade_id'] = $user->role === 'reitor' ? $request->unidade_id : $user->unidade_id;

        Registro::create($data);

        return redirect()->route('login.sucesso')->with('success', 'Registro criado com sucesso!');
    }

    // Formulário de edição
    public function edit(Registro $registro)
    {
        $user = Auth::user();

        // Carrega todas as unidades para o select
        $unidades = Unidade::all();

        return view('registros.edit', compact('registro', 'unidades'));
    }

    // Atualiza um registro
    public function update(Request $request, Registro $registro)
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

        $data['status'] = $data['status'] ?? $registro->status;
        $data['unidade_id'] = $user->role === 'reitor' ? $request->unidade_id : $registro->unidade_id;

        $registro->update($data);

        return redirect()->route('login.sucesso')->with('success', 'Registro atualizado com sucesso!');
    }

    // Deleta um registro
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return redirect()->route('login.sucesso')->with('success', 'Registro removido com sucesso!');
    }

    // Exibe detalhes de um registro
    public function show(Registro $registro)
{
    $user = Auth::user();

    // Segurança: usuário comum só vê registros da própria unidade
    if ($user->role !== 'reitor' && $registro->unidade_id !== $user->unidade_id) {
        abort(403, 'Acesso negado.');
    }

    // Carrega relacionamento com unidade e tipo
    $registro->load(['unidade', 'tipoRegistro']);

    // Se quiser buscar dados via API, pode fazer aqui
    if ($registro->tipoRegistro_id == 1) {
        // Patente: buscar na API externa se necessário
        // $apiData = ApiService::getPatente($registro->numero_pedido);
        // $registro->api_data = $apiData;
    } elseif ($registro->tipoRegistro_id == 2) {
        // Marca: mesma lógica
        // $apiData = ApiService::getMarca($registro->numero_pedido);
        // $registro->api_data = $apiData;
    }

    return view('registros.show', compact('registro'));
}

}
