@extends ('templates.template')
@section('content')
<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Create Categoria</h1>
        <form method="post" action="{{route('categoria.store')}}">
            @csrf
            @method('post')
            <!-- Campo para a categoria -->
            <div class="textfield">
                <input type="text" id="categoria" name="categoria" required>
                <label for="categoria">Categoria</label>
            </div>

            <!-- Botão de envio -->
            <div class="textfield-botao">
                <div class="textfield-botao-submit">
                    <input type="submit" value="Salvar categoria" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection