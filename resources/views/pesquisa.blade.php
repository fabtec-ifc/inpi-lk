@extends('layouts.app')

@section('title', 'Pesquisa')

@section('body')
    @component('nav') @endcomponent

    <div class="container-lg py-4">
        {{-- Barra de pesquisa --}}
        <div class="d-flex justify-content-between mb-4 flex-row align-items-center">
            <div class="col-sm-5 col-lg-3">
                <div class="mb-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipoBuscaRadio" id="buscaPatente" value="patente" checked>
                        <label class="form-check-label" for="buscaPatente">Patente</label>
                        <input class="form-check-input" type="radio" name="tipoBuscaRadio" id="buscaMarca" value="marca">
                        <label class="form-check-label" for="buscaMarca">Marca</label>
                    </div>
                </div>

                <form id="formBusca" method="POST">
                    @csrf
                    <input type="hidden" name="tipoBusca" id="inputTipoBusca" value="patente">

                    <div class="br-input large input-button">
                        <input id="input-search-large" type="search" placeholder="Procurar por patente" name="filtro" required />
                        <button class="br-button br-button-search" type="submit" aria-label="Buscar">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formBusca');
            const input = document.getElementById('input-search-large');
            const radioPatente = document.getElementById('buscaPatente');
            const radioMarca = document.getElementById('buscaMarca');
            const inputTipoBusca = document.getElementById('inputTipoBusca');

            function atualizarPlaceholder() {
                if (radioMarca.checked) {
                    input.placeholder = 'Procurar por marca';
                    inputTipoBusca.value = 'marca';
                } else {
                    input.placeholder = 'Procurar por patente';
                    inputTipoBusca.value = 'patente';
                }
            }

            function atualizarAction() {
                form.action = radioMarca.checked
                    ? "{{ route('marcas.consultar') }}"
                    : "{{ route('patentes.consultar') }}";
            }

            radioPatente.addEventListener('change', () => {
                atualizarPlaceholder();
                atualizarAction();
            });

            radioMarca.addEventListener('change', () => {
                atualizarPlaceholder();
                atualizarAction();
            });

            atualizarPlaceholder();
            atualizarAction();
        });
    </script>
@endsection
