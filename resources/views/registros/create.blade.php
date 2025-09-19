@extends('layouts.app')

@section('title', 'Novo Registro')

@section('body')
@component('nav') @endcomponent

<div class="container-lg py-4">
    <h2 class="mb-4">Cadastrar Registro</h2>

    <form action="{{ route('registros.store') }}" method="POST" class="br-form">
        @csrf

        {{-- Número do Pedido --}}
        <div class="br-input mb-3">
            <label for="numero_pedido">Número do Pedido</label>
            <input id="numero_pedido" type="text" name="numero_pedido" placeholder="Ex: 123456789" required>
        </div>

        {{-- Título --}}
        <div class="br-input mb-3">
            <label for="titulo">Título</label>
            <input id="titulo" type="text" name="titulo" placeholder="Digite o título do registro" required>
        </div>

        {{-- Status --}}
        <div class="br-input mb-3">
            <label for="status">Status</label>
            <input id="status" type="text" name="status" value="Em análise" placeholder="Ex: Em análise">
        </div>

        {{-- Unidade --}}
        <div class="br-input mb-3">
            <label for="unidade_id">Unidade</label>
            <select name="unidade_id" id="unidade_id" class="form-control">
                <option value="">Selecione a unidade</option>
                @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tipo de Registro --}}
        <div class="mb-3">
            <label class="mb-2">Tipo de Registro</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoRegistro_id" id="patente" value="1" required>
                <label class="form-check-label" for="patente">Patente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoRegistro_id" id="marca" value="2">
                <label class="form-check-label" for="marca">Marca</label>
            </div>
        </div>

        {{-- Resumo --}}
        <div class="br-input mb-3">
            <label for="resumo">Resumo</label>
            <textarea id="resumo" name="resumo" rows="4" placeholder="Digite um resumo do registro"></textarea>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="br-button primary">Salvar</button>
            <a href="{{ route('login.sucesso') }}" class="br-button secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
