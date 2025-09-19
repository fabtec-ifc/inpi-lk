<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sigla' => 'required',
            'cidade' => 'required',
        ]);

        Unidade::create($request->all());
        return redirect()->route('unidades.index')->with('success', 'Unidade criada com sucesso!');
    }

    public function edit(Unidade $unidade)
    {
        return view('unidades.edit', compact('unidade'));
    }

    public function update(Request $request, Unidade $unidade)
    {
        $request->validate([
            'nome' => 'required',
            'sigla' => 'required',
            'cidade' => 'required',
        ]);

        $unidade->update($request->all());
        return redirect()->route('unidades.index')->with('success', 'Unidade atualizada!');
    }

    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        return redirect()->route('unidades.index')->with('success', 'Unidade excluída!');
    }
}
