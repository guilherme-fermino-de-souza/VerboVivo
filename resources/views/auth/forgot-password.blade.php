<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ url('assets/css/forgot-password.css') }}">
</head>

<body>

    <div class="content">
        <div class="container">
            <p class="info-text">
                Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link para redefinição de senha que permitirá que você escolha uma nova.
            </p>

            <!-- Mensagem de status -->
            @if (session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus>

                    <!-- Mensagem de erro -->
                    @error('email')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit">Link de redefinição de senha de e-mail</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>