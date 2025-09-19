@extends('layouts.app')

@section('title', 'Nova Unidade')

@section('body')
<div class="container-lg py-4">
    <h2>Cadastrar Unidade</h2>
    <form action="{{ route('unidades.store') }}" method="POST">
        @csrf
        <div class="br-input mb-3">
            <label>Nome</label>
            <input type="text" name="nome" required>
        </div>
        <div class="br-input mb-3">
            <label>Sigla</label>
            <input type="text" name="sigla" required>
        </div>
        <div class="br-input mb-3">
            <label>Cidade</label>
            <input type="text" name="cidade" required>
        </div>
        <button type="submit" class="br-button primary">Salvar</button>
        <a href="{{ route('unidades.index') }}" class="br-button secondary">Cancelar</a>
    </form>
</div>
@endsection
