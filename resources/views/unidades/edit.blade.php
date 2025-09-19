@extends('layouts.app')

@section('title', 'Editar Unidade')

@section('body')
<div class="container-lg py-4">
    <h2>Editar Unidade</h2>
    <form action="{{ route('unidades.update', $unidade) }}" method="POST">
        @csrf @method('PUT')
        <div class="br-input mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ $unidade->nome }}" required>
        </div>
        <div class="br-input mb-3">
            <label>Sigla</label>
            <input type="text" name="sigla" value="{{ $unidade->sigla }}" required>
        </div>
        <div class="br-input mb-3">
            <label>Cidade</label>
            <input type="text" name="cidade" value="{{ $unidade->cidade }}" required>
        </div>
        <button type="submit" class="br-button primary">Atualizar</button>
        <a href="{{ route('unidades.index') }}" class="br-button secondary">Cancelar</a>
    </form>
</div>
@endsection
