@extends('app')

@section('main')
    <div class="br-table col-12 my-5" data-search="data-search" data-selection="data-selection" data-collapse="data-collapse"
        data-random="data-random">
        <div class="table-header">
            <div class="top-bar">
                <div class="table-title">Título da Tabela</div>
            </div>
        </div>
        <table>
            <caption>Título da Tabela</caption>
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Data do Depósito</th>
                    <th scope="col">Data da Publicação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-th="Título coluna 1">{{ $data['detalhes']['dadosGerais']['(21)Nº do Pedido:'] }}</td>
                    <td data-th="Título coluna 2">{{ $data['detalhes']['dadosGerais']['(22)Data do Depósito:'] }}</td>
                    <td data-th="Título coluna 3">{{ $data['detalhes']['dadosGerais']['(43)Data da Publicação:'] }}</td>
                </tr>
            </tbody>
        </table>
        <div class="table-footer">
            <nav class="br-pagination" aria-label="paginação" data-total="4" data-current="1">
                <ul>
                    <li>
                        <button class="br-button circle" type="button" data-previous-page="data-previous-page"
                            aria-label="Voltar página"><i class="fas fa-angle-left" aria-hidden="true"></i>
                        </button>
                    </li>
                    <li><a class="page active" aria-label="Página 1" href="javascript:void(0)">1</a></li>
                    <li><a class="page" aria-label="Página 2" href="javascript:void(0)">2</a></li>
                    <li><a class="page" aria-label="Página 3" href="javascript:void(0)">3</a></li>
                    <li><a class="page" aria-label="Página 4" href="javascript:void(0)">4</a></li>
                    <li>
                        <button class="br-button circle" type="button" data-next-page="data-next-page"
                            aria-label="Página seguinte"><i class="fas fa-angle-right" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
