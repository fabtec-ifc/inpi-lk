@extends('layouts.app')

@section('title', 'Detalhes do Registro')

@section('body')
    @component('nav') @endcomponent

    <div class="container-lg py-4">
        <h2>Detalhes do Registro</h2>

        <div class="mb-3">
            <strong>ID:</strong> {{ $registro->id }}
        </div>
        <div class="mb-3">
            <strong>Número do Processo:</strong> {{ $registro->numero_pedido }}
        </div>
        <div class="mb-3">
            <strong>Título:</strong> {{ $registro->titulo }}
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ $registro->status }}
        </div>
        <div class="mb-3">
            <strong>Unidade:</strong> {{ $registro->unidade->nome ?? '-' }}
        </div>
        <div class="mb-3">
            <strong>Tipo de Registro:</strong> {{ $registro->tipoRegistro->nome ?? '-' }}
        </div>

        @if(isset($registro->api_data))
            <div class="mb-3">
                <h4>Dados da API:</h4>
                <pre>{{ print_r($registro->api_data, true) }}</pre>
            </div>
        @endif

        <a href="{{ route('login.sucesso') }}" class="br-button secondary">Voltar</a>
    </div>
@endsection
