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

            <!-- Campo de usuário -->
            <div class="br-input">
                <label for="login">Usuário</label>
                <input placeholder="Informe seu email" type="text" id="login" name="login" required>
            </div>

            <!-- Campo de senha -->
            <div class="br-input input-button mt-2 position-relative">
                <label for="senha">Senha</label>
                <input id="senha" type="password" placeholder="Digite sua senha" name="senha" required autocomplete="current-password">

                <!-- Botão de mostrar senha (type button, não submit) -->
                <button type="button" class="br-button" aria-label="Exibir senha" role="switch" aria-checked="false" onclick="togglePassword()">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </button>

                <x-input-error :messages="$errors->get('senha')" class="mt-2" />
            </div>

            <!-- Botão de submit -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="br-button primary">Entrar</button>
            </div>
        </form>
    </div>
</div>

<!-- Script simples para mostrar/ocultar senha -->
<script>
function togglePassword() {
    const input = document.getElementById('senha');
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
}
</script>
@endsection
