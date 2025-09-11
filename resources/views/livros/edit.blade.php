@extends ('templates.template')
@section('content')
<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Edit Product</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{route('livro.update', ['livro' => $livro])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="text" id="titulo" name="titulo" value="{{$livro->titulo}}" placeholder="título" required>
            </div>

            <!-- Campo para a descrição -->
            <div class="textfield">
                <input type="text" id="descricao" name="descricao" value="{{$livro->descricao}}" placeholder="descrição" required>
            </div>

            <!-- Campo para o autor -->
            <div class="textfield">
                <input type="text" id="autor" name="autor" value="{{$livro->autor}}" placeholder="autor" required>
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
            </div>

            <!-- Campo para o ano de lançamento -->
            <div class="textfield">
                <input type="date" id="anolancamento" name="anolancamento" value="{{$livro->anolancamento}}" placeholder="ano lançamento" required>
            </div>

            <!-- Campo para o preço -->
            <div class="textfield">
                <input type="number" step="0.01" id="preco" name="preco" value="{{$livro->preco}}" placeholder="preço" required>
            </div>

            <!-- Campo para a quantidade -->
            <div class="textfield">
                <input type="number" id="quantidade" name="quantidade" value="{{$livro->quantidade}}" placeholder="quantidade" required>
            </div>

            <!-- Campo para a imagem -->
            <div class="textfield">
                <input type="file" id="image" name="image" accept="image/*">
                <div class="image">
                    <img src="{{ $livro->name ? asset('images/livros/'.$livro->name) : asset('images/livros/book-cover-default.jpg') }}" alt="Imagem do livro" height="100" width="100">
                </div>
            </div>

            <div class="textfield-botao">
                <div class="textfield-botao-submit">
                    <input type="submit" value="Atualizar Livro" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection