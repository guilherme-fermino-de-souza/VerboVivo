@extends('admin.template.layout')

@section('main')
<div class="usuario-cadastro">

    <h1>Cadastrar Novo Administrador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Corrija os campos abaixo:
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="form-cadastro">
        @csrf

        <div class="form-grupo">
            <label for="nome">Nome completo</label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="form-grupo">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-grupo">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-grupo">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" maxlength="11" placeholder="Somente números" value="{{ old('cpf') }}" required>
        </div>

        <div class="form-grupo">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" required>
        </div>

        <div class="form-grupo">
            <label for="foto">Foto de Perfil (opcional)</label>
            <input type="file" name="foto" id="foto" accept="image/*">
        </div>

        <div id="telefones-section">
            <label>Telefones</label>
            <div class="telefone-item">
                <input type="text" name="numero_telefone[]" placeholder="(DDD) 99999-9999" required>
                <button type="button" class="btn-add-telefone" onclick="adicionarTelefone()">+</button>
            </div>
        </div>

        <input type="hidden" name="tipo_usuario" value="1">

        <div class="form-acoes">
            <button type="submit" class="btn-salvar">Cadastrar Admin</button>
            <a href="{{ route('admin.index') }}" class="btn-voltar">Voltar</a>
        </div>
    </form>
</div>

<style>
.usuario-cadastro {
    max-width: 600px;
    margin: 0 auto;
    background: #1e1e1e;
    color: #f0f0f0;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}
.usuario-cadastro h1 {
    text-align: center;
    margin-bottom: 20px;
}
.form-grupo {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}
.form-grupo label {
    font-weight: bold;
    margin-bottom: 5px;
}
.form-grupo input {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #555;
    background-color: #2a2a2a;
    color: #f0f0f0;
}
#telefones-section .telefone-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}
.btn-add-telefone {
    background-color: #2a9d8f;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
}
.btn-add-telefone:hover {
    background-color: #248277;
}
.form-acoes {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}
.btn-salvar, .btn-voltar {
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    text-align: center;
}
.btn-salvar {
    background-color: #007bff;
    color: #fff;
}
.btn-voltar {
    background-color: #444;
    color: #fff;
}
.alert {
    background-color: #a00;
    color: #fff;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}
</style>

<script>
function adicionarTelefone() {
    const section = document.getElementById('telefones-section');
    const novo = document.createElement('div');
    novo.classList.add('telefone-item');
    novo.innerHTML = `
        <input type="text" name="numero_telefone[]" placeholder="(DDD) 99999-9999" required>
        <button type="button" class="btn-remove" onclick="this.parentElement.remove()">–</button>
    `;
    section.appendChild(novo);
}
</script>
@endsection
