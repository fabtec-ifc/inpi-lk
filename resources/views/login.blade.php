@extends('layouts.app')

@section('title', 'Login')

@section('body')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <div class="br-input">
                <label for="input-medium">Usuário</label>
                <input placeholder="Informe seu email" type="text" id="login" name="login" required >
            </div>

            <div class="br-input input-button mt-2">
                <label for="input-password">Senha</label>
                <input id="senha" type="password" placeholder="Digite sua senha" name="senha" required
                    autocomplete="current-password" />
                <button class="br-button" type="button" aria-label="Exibir senha" role="switch" aria-checked="false"><i
                        class="fas fa-eye" aria-hidden="true"></i>
                </button>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="br-button primary mt-3 mt-sm-0 ml-sm-3 m-0">Entrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
