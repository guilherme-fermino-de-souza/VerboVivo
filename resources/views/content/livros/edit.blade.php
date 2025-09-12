@extends ('content.livros.template.layout')

@section('content')
<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Editar Livro</h1>
        <form method="post" action="{{route('livro.update', ['livro' => $livro])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="text" id="titulo" name="titulo" value="{{$livro->titulo}}" placeholder="título" required>
                <label for="titulo">Título</label>
            </div>

            <!-- Campo para a descrição -->
            <div class="textfield">
                <input type="text" id="descricao" name="descricao" value="{{$livro->descricao}}" placeholder="descrição" required>
                <label for="descricao">Descrição</label>
            </div>

            <!-- Campo para o autor -->
            <div class="textfield">
                <input type="text" id="autor" name="autor" value="{{$livro->autor}}" placeholder="autor" required>
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

            <!-- Campo para o país de origem -->
            <div class="textfield">
                <input type="text" id="paisorigem" name="paisorigem" value="{{$livro->paisorigem}}" placeholder="país origem" required>
                <label for="paisorigem">País de origem</label>
            </div>

            <!-- Campo para o ano de lançamento -->
            <div class="textfield">
                <input type="date" id="anolancamento" name="anolancamento" value="{{$livro->anolancamento}}" placeholder="ano lançamento" required>
                <label for="anolancamento">Ano de Publicação</label>
            </div>

            <!-- Campo para o preço -->
            <div class="textfield">
                <input type="number" step="0.01" id="preco" name="preco" value="{{$livro->preco}}" placeholder="preço" required>
                <label for="preco">Preço</label>
            </div>

            <!-- Campo para a quantidade -->
            <div class="textfield">
                <input type="number" id="quantidade" name="quantidade" value="{{$livro->quantidade}}" placeholder="quantidade" required>
                <label for="quantidade">quantidade</label>
            </div>

            <!-- Campo para a imagem -->
            <div class="textfield">
                <input type="file" id="image" name="image" accept="image/*">
                <div class="image">
                    <img src="{{ $livro->name ? asset('images/livros/'.$livro->name) : asset('images/livros/book-cover-default.jpg') }}" alt="Imagem do livro" height="100" width="100">
                </div>
            </div>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar categoria" />
            </div>
        </form>
    </div>
</div>
@endsection