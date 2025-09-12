@extends ('content.categorias.template.layout')

@section('content')
<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Criar Categoria</h1>
        <form method="post" action="{{ route('categoria.store') }}">
            @csrf
            <div class="textfield">
                <input type="text" id="categoria" name="categoria" required>
                <label for="categoria">Nome da categoria</label>
            </div>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar categoria" />
            </div>
        </form>
    </div>
</div>
@endsection
