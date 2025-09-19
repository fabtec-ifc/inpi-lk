@extends('layouts.app')

@section('title', 'Minhas Patentes')

@section('body')
    @component('nav') @endcomponent

    <div class="container-lg py-4">
        <div class="row">
            <div class="col-12">

                <h3>Minhas Patentes</h3>
                @if($patentesLocal->isEmpty())
                    <p>Nenhuma patente encontrada no banco local.</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nº do Processo</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patentesLocal as $patente)
                                <tr>
                                    <td>{{ $patente->id }}</td>
                                    <td>{{ $patente->numero_pedido }}</td>
                                    <td>{{ $patente->titulo ?? '-' }}</td>
                                    <td>{{ $patente->status ?? '-' }}</td>
                                    <td>
                                        <a href="{{ $patente->getViewUrl() }}" class="br-button primary small">Abrir</a>
                                        <a href="{{ route('registros.edit', $patente->id) }}" class="br-button secondary small">Editar</a>

                                        <!-- Botão de excluir -->
                                        <form action="{{ route('registros.destroy', $patente->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="br-button danger small"
                                                    onclick="return confirm('Tem certeza que deseja excluir esta patente?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <h3 class="mt-4">Minhas Marcas</h3>
                @if($marcasLocal->isEmpty())
                    <p>Nenhuma marca encontrada no banco local.</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nº do Processo</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($marcasLocal as $marca)
                                <tr>
                                    <td>{{ $marca->id }}</td>
                                    <td>{{ $marca->numero_pedido }}</td>
                                    <td>{{ $marca->titulo ?? '-' }}</td>
                                    <td>{{ $marca->status ?? '-' }}</td>
                                    <td>
                                        <a href="{{ $marca->getViewUrl() }}" class="br-button primary small">Abrir</a>
                                        <a href="{{ route('registros.edit', $marca->id) }}" class="br-button secondary small">Editar</a>

                                        <!-- Botão de excluir -->
                                        <form action="{{ route('registros.destroy', $marca->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="br-button danger small"
                                                    onclick="return confirm('Tem certeza que deseja excluir esta marca?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
