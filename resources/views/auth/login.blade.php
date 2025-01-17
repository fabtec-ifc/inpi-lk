@extends('layouts.guest')

@section('login')
    <h1>Login</h1>
    <form action="" method="post">
        @csrf

        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="br-input">
                    <label for="login">Login</label>
                    <input id="login" name="login" type="email" placeholder="Login" />
                    <p></p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="br-input">
                    <label for="senha">Senha</label>
                    <input id="senha" name="senha" type="password" placeholder="Senha" />
                    <p></p>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12">
                <div class="p-3">
                    <input type="submit" class="br-button block primary mb-3" value="Logar"></input>
                    <a href="{{ route('app') }}" class="br-button block" type="button">Voltar
                    </a>
                </div>
            </div>
        </div>

    </form>
@endsection
