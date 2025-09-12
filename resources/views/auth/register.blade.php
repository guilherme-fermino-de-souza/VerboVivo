<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" href="{{ url('assets/css/auth/register.css') }}">
</head>

<body>
    <div class="auth-container">
        <a class="voltar" href="{{ route('welcome') }}"><img src="{{ asset('/Images/logos/symbols/back-button.png') }}"></a>

        <div class="register-content">
            <img class="logo" src="{{ asset('/Images/logos/verbovivo/verbo-vivo.png') }}">
            <form method="POST" action="{{ route('register') }}" class="register-form">
                @csrf

                <h2>Criar Conta</h2>

                <!-- Nome -->
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror

                <!-- CPF -->
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}">
                @error('cpf')
                <span class="error">{{ $message }}</span>
                @enderror

                <!-- Data de Nascimento -->
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}">
                @error('data_nascimento')
                <span class="error">{{ $message }}</span>
                @enderror

                <!-- Email -->
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror

                <!-- Senha -->
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror

                <!-- Confirmar Senha -->
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>

                <div style="display: flex; justify-content:flex-end; padding: .5rem 0;">
                    <button type="submit">Registrar</button>
                </div>

                <!-- Criar conta -->
                <div class="register-link">
                    <p>Já possui conta? <a href="{{ route('login') }}">Clique aqui</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>