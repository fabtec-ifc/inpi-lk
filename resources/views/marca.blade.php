@extends('layouts.app')

@section('title', 'Resultado da Marca')

@section('body')
    @component('nav') @endcomponent

    <div class="container py-4">
        <h2>
            Resultado da Marca
            @if(isset($numeroMarca))
                <small class="text-muted">— {{ $numeroMarca }}</small>
            @endif
        </h2>

        {{-- DADOS GERAIS --}}
        @if(isset($detalhes['dados-gerais']))
            <h4 class="mt-4">Dados Gerais</h4>
            <ul>
                @foreach($detalhes['dados-gerais'] as $campo => $valor)
                    @if($campo !== 'Nº do Processo')
                        <li><strong>{{ $campo }}:</strong>
                            @if(is_array($valor))
                                <ul>
                                    @foreach($valor as $k => $v)
                                        <li><strong>{{ $k }}:</strong> {{ is_array($v) ? json_encode($v, JSON_UNESCAPED_UNICODE) : $v }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $valor }}
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif

        {{-- CLASSIFICAÇÃO --}}
        @if(isset($detalhes['classificacao']))
            <h4 class="mt-4">Classificação de Produtos / Serviços</h4>
            <ul>
                @foreach($detalhes['classificacao'] as $campo => $valor)
                    <li><strong>{{ $campo }}:</strong>
                        @if(is_array($valor))
                            {{ json_encode($valor, JSON_UNESCAPED_UNICODE) }}
                        @else
                            {{ $valor }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- DATAS --}}
        @if(isset($detalhes['datas']))
            <h4 class="mt-4">Datas</h4>
            <ul>
                @foreach($detalhes['datas'] as $campo => $valor)
                    <li><strong>{{ ucfirst($campo) }}:</strong>
                        @if(is_array($valor))
                            {{ json_encode($valor, JSON_UNESCAPED_UNICODE) }}
                        @else
                            {{ $valor }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- PRAZOS --}}
        @if(isset($detalhes['prazos']))
            <h4 class="mt-4">Prazos para Prorrogação de Registro</h4>
            <ul>
                @foreach($detalhes['prazos'] as $campo => $valor)
                    <li><strong>{{ $campo }}:</strong>
                        @if(is_array($valor))
                            {{ json_encode($valor, JSON_UNESCAPED_UNICODE) }}
                        @else
                            {{ $valor }}
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- PETIÇÕES --}}
        @if(isset($detalhes['peticoes']))
            <h4 class="mt-4">Petições</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Protocolo</th>
                        <th>Serviço</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalhes['peticoes'] as $peticao)
                        <tr>
                            <td>{{ $peticao['cliente'] ?? '-' }}</td>
                            <td>{{ $peticao['data'] ?? '-' }}</td>
                            <td>{{ $peticao['protocolo'] ?? '-' }}</td>
                            <td>{{ $peticao['servico'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- PUBLICAÇÕES --}}
        @if(isset($detalhes['publicacoes']))
            <h4 class="mt-4">Publicações</h4>
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Despacho</th>
                        <th>RPI</th>
                        <th>Data</th>
                        <th>Complemento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalhes['publicacoes'] as $pub)
                        <tr>
                            <td>{{ $pub['despacho'] ?? '-' }}</td>
                            <td>{{ $pub['rpi'] ?? '-' }}</td>
                            <td>{{ $pub['data-rpi'] ?? '-' }}</td>
                            <td>{{ $pub['complemento'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(!isset($detalhes))
            <p class="text-danger">Nenhum dado encontrado para a marca informada.</p>
        @endif
    </div>
@endsection
