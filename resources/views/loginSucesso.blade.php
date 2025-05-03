<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bem-Sucedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #f5f5f5;
        }
        .success-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            display: inline-block;
            max-width: 600px;
            margin: 0 auto;
        }
        .success-icon {
            color: #28a745;
            font-size: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="success-box">
        <div class="success-icon">✓</div>
        <h1>Login Realizado com Sucesso!</h1>

        <div style="margin: 30px 0; text-align: left; display: inline-block;">
            @if(session('usuario'))
                <p><strong>Usuário:</strong> {{ session('usuario') }}</p>
                <p><strong>Token:</strong> {{ substr(session('token'), 0, 15) }}... (exibição parcial)</p>
            @else
                <p style="color: red;">Nenhuma sessão ativa encontrada</p>
            @endif
        </div>

        <div>
            <a href="/login" style="
                display: inline-block;
                padding: 10px 20px;
                background: #007bff;
                color: white;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 20px;
            ">Voltar ao Login</a>
        </div>
    </div>
</body>
</html>
