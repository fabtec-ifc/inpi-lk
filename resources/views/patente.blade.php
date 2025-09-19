@extends('layouts.app')

@section('title', 'Resultado da Patente')

@section('body')
    @component('nav') @endcomponent

    <div class="container py-4">
        @php
            $numeroPedido = null;
            if (isset($detalhes['dadosGerais'])) {
                foreach ($detalhes['dadosGerais'] as $chave => $valor) {
                    if (stripos($chave, 'nº do pedido') !== false || stripos($chave, 'número do pedido') !== false) {
                        $numeroPedido = $valor;
                        break;
                    }
                }
            }
        @endphp

        <h2>
            Resultado da Patente
            @if($numeroPedido)
                <small class="text-muted">: {{ $numeroPedido }}</small>
            @endif
        </h2>

        {{-- DADOS GERAIS --}}
        @if(isset($detalhes['dadosGerais']))
            <h4 class="mt-4">Dados Gerais</h4>
            <ul>
                @foreach($detalhes['dadosGerais'] as $chave => $valor)
                    @continue(stripos($chave, 'nº do pedido') !== false || stripos($chave, 'número do pedido') !== false)

                    @if(is_array($valor))
                        <li><strong>{{ $chave }}:</strong>
                            <ul>
                                @foreach($valor as $sub => $subValor)
                                    <li><strong>{{ $sub }}:</strong> {{ $subValor }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><strong>{{ $chave }}:</strong> {{ $valor }}</li>
                    @endif
                @endforeach
            </ul>

        @endif

        {{-- ANUIDADES --}}
        @if(isset($detalhes['anuidades']))
            <h4 class="mt-4">Anuidades</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Ano</th>
                        <th>Tipo</th>
                        <th>Início</th>
                        <th>Fim</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalhes['anuidades'] as $ano => $tipos)
                        @foreach($tipos as $tipo => $periodo)
                            <tr>
                                <td>{{ $ano }}</td>
                                <td>{{ $tipo }}</td>
                                <td>{{ $periodo['inicio'] ?? '-' }}</td>
                                <td>{{ $periodo['fim'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- PETIÇÕES --}}
        @if(isset($detalhes['peticoes']))
            <h4 class="mt-4">Petições</h4>
            @foreach($detalhes['peticoes'] as $tipo => $lista)
                <h5>{{ $tipo }}</h5>
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Protocolo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lista as $peticao)
                            <tr>
                                <td>{{ $peticao['descricao'] }}</td>
                                <td>{{ $peticao['data'] }}</td>
                                <td>{{ $peticao['cliente'] }}</td>
                                <td>{{ $peticao['protocolo'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalhes['publicacoes'] as $pub)
                        <tr>
                            <td>{{ $pub['despacho'] }}</td>
                            <td>{{ $pub['rpi'] }}</td>
                            <td>{{ $pub['data-rpi'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if(!isset($detalhes))
            <p class="text-danger">Nenhum dado encontrado para a patente informada.</p>
        @endif
    </div>
@endsection
