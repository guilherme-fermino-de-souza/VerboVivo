@extends ('templates.template')
@section('content')
<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Create Livro</h1>
        <form method="post" action="{{route('livro.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Campo para o título -->
            <div class="textfield">
                <input type="text" id="titulo" name="titulo" required>
                <label for="titulo">Título</label>
            </div>

            <!-- Campo para a descrição -->
            <div class="textfield">
                <input type="text" id="descricao" name="descricao" required>
                <label for="descricao">Descrição</label>
            </div>

            <!-- Campo para o autor -->
            <div class="textfield">
                <input type="text" id="autor" name="autor" required>
                <label for="autor">Autor</label>
            </div>

            <!-- Campo para o Idioma -->
            <div class="textfield">
                <select id="idioma" name="idioma" required>
                    <option value="portugues">Português</option>
                    <option value="ingles">Inglês</option>
                    <option value="espanhol">Espanhol</option>
                </select>
            </div>

            <!-- Campo para o País de Origem -->
            <div class="textfield">
                <input type="text" id="paisorigem" name="paisorigem" required>
                <label for="paisorigem">País de Origem</label>
            </div>

            <!-- Campo para o ano de lançamento -->
            <div class="textfield">
                <input type="number" id="anolancamento" name="anolancamento" required>
                <label for="anolancamento">Ano Lançamento</label>
            </div>

            <!-- Campo para o preço -->
            <div class="textfield">
                <input type="number" step="0.01" id="preco" name="preco" required>
                <label for="preco">Preço</label>
            </div>

            <!-- Campo para a quantidade -->
            <div class="textfield">
                <input type="number" id="quantidade" name="quantidade" required>
                <label for="quantidade">Quantidade</label>
            </div>

            <!-- Campo para a imagem -->
            <div class="textfield-file">
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Campo para as Categorias (Foreign Key) -->
            <fieldset>
                <legend>Categorias Livro</legend>
                @foreach ($categorias as $categoria)
                <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" id="{{ $categoria->id }}">
                <label for="{{ $categoria->id }}">{{ $categoria->categoria }}</label>

                @endforeach
            </fieldset>

            <!-- Botão de envio -->
            <div class="textfield-botao">
                <div class="textfield-botao-submit">
                    <input type="submit" value="Salvar livro" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection