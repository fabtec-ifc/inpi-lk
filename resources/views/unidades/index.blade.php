@extends('layouts.app')

@section('title', 'Unidades')

@section('body')
<div class="container-lg py-4">
    <h2>Lista de Unidades</h2>
    <a href="{{ route('unidades.create') }}" class="br-button primary mb-3">+ Nova Unidade</a>

    @if(session('success'))
        <div class="br-message success mt-2">{{ session('success') }}</div>
    @endif

    <table class="br-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unidades as $unidade)
            <tr>
                <td>{{ $unidade->id }}</td>
                <td>{{ $unidade->nome }}</td>
                <td>{{ $unidade->sigla }}</td>
                <td>{{ $unidade->cidade }}</td>
                <td>
                    <a href="{{ route('unidades.edit', $unidade) }}" class="br-button secondary small">Editar</a>
                    <form action="{{ route('unidades.destroy', $unidade) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="br-button danger small">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
