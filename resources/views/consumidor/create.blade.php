    @extends ('templates.template')
    @section('content')
    <div class="container-crete">
        <div class="container-create-conteudo">
            <h1>Criar Conta</h1>
            <div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <form action="{{route('consumidor.store')}}" method="post">
                @csrf
                <input type="hidden" name="tipo_usuario" value="2"> <!-- Tipo User Consumidor-->

                <div class="textfield">
                    <input type="text" id="nome" name="name" required placeholder="Seu nome">
                    <i class='bx bxs-user'></i>
                </div>

                <div class="textfield">
                    <input type="email" id="email" name="email" required placeholder="Seu e-mail">
                    <i class='bx bxs-envelope'></i>
                </div>

                <div class="textfield">
                    <input type="password" id="senha" name="password" required placeholder="Senha">
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="textfield">
                    <input type="number" id="cpf" name="cpf" required placeholder="cpf">
                </div>

                <div class="textfield">
                    <input type="date" id="data_nascimento" name="data_nascimento" required placeholder="Data Nascimento">
                </div>

                <!-- Telefone -->
                <div id="telefones">
                    @php
                    $telefones = old('numero_telefone', ['']);
                    @endphp

                    @foreach ($telefones as $index => $tel)
                    <div class="textfield">
                        <label>Telefone {{ $index + 1 }}</label>
                        <input type="tel" name="numero_telefone[]" value="{{ $tel }}">
                    </div>
                    @endforeach
                </div>

                <button type="button" class="botao-telefone" onclick="adicionarTelefone()">Adicionar Telefone</button>

                <div class="textfield-botao">
                    <div class="textfield-botao-submit">
                        <input type="submit" value="Criar Conta" />
                    </div>
                </div>

                <div class="textfield-link">
                    <p>Já tem uma conta? Clique <a href="/">aqui</a></p>
                </div>
            </form>
        </div>
    </div>
    @endsection