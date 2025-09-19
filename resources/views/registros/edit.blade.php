@extends('layouts.app')

@section('title', 'Editar Registro')

@section('body')
@component('nav') @endcomponent

<div class="container-lg py-4">
    <h2 class="mb-4">Editar Registro</h2>

    <form action="{{ route('registros.update', $registro->id) }}" method="POST" class="br-form">
        @csrf
        @method('PUT')

        {{-- Número do Pedido --}}
        <div class="br-input mb-3">
            <label for="numero_pedido">Número do Pedido</label>
            <input id="numero_pedido" type="text" name="numero_pedido" value="{{ $registro->numero_pedido }}">
        </div>

        {{-- Título --}}
        <div class="br-input mb-3">
            <label for="titulo">Título</label>
            <input id="titulo" type="text" name="titulo" value="{{ $registro->titulo }}" required>
        </div>

        {{-- Status --}}
        <div class="br-input mb-3">
            <label for="status">Status</label>
            <input id="status" type="text" name="status" value="{{ $registro->status ?? 'Em análise' }}">
        </div>

        {{-- Unidade (somente para reitor) --}}
        @if(!empty($unidades))
        <div class="br-input mb-3">
            <label for="unidade_id">Unidade</label>
            <select name="unidade_id" id="unidade_id" class="form-control" required>
                @foreach($unidades as $unidade)
                    <option value="{{ $unidade->id }}" {{ $registro->unidade_id == $unidade->id ? 'selected' : '' }}>
                        {{ $unidade->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        @endif

        {{-- Tipo de Registro --}}
        <div class="mb-3">
            <label class="mb-2">Tipo de Registro</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoRegistro_id" id="patente" value="1" {{ $registro->tipoRegistro_id == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="patente">Patente</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipoRegistro_id" id="marca" value="2" {{ $registro->tipoRegistro_id == 2 ? 'checked' : '' }}>
                <label class="form-check-label" for="marca">Marca</label>
            </div>
        </div>

        {{-- Resumo --}}
        <div class="br-input mb-3">
            <label for="resumo">Resumo</label>
            <textarea id="resumo" name="resumo" rows="4">{{ $registro->resumo }}</textarea>
        </div>

        {{-- Botões --}}
        <div class="d-flex gap-2">
            <button type="submit" class="br-button primary">Atualizar</button>
            <a href="{{ route('login.sucesso') }}" class="br-button secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
