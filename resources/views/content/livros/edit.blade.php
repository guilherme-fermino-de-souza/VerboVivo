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

                @if ($errors->has('titulo'))
                <p class="error">{{ $errors->first('titulo') }}</p>
                @endif
            </div>

            <!-- Campo para a descrição -->
            <div class="textfield">
                <input type="text" id="descricao" name="descricao" value="{{$livro->descricao}}" placeholder="descrição" required>
                <label for="descricao">Descrição</label>

                @if ($errors->has('descricao'))
                <p class="error">{{ $errors->first('descricao') }}</p>
                @endif
            </div>

            <!-- Campo para o autor -->
            <div class="textfield">
                <input type="text" id="autor" name="autor" value="{{$livro->autor}}" placeholder="autor" required>
                <label for="autor">Autor</label>

                @if ($errors->has('autor'))
                <p class="error">{{ $errors->first('autor') }}</p>
                @endif
            </div>

            <!-- Campo para o Idioma -->
            <div class="textfield">
                <select id="idioma" name="idioma" required>
                    <option value="portugues" {{ $livro->idioma === 'portugues' ? 'selected' : '' }}>Português</option>
                    <option value="ingles" {{ $livro->idioma === 'ingles' ? 'selected' : '' }}>Inglês</option>
                    <option value="espanhol" {{ $livro->idioma === 'espanhol' ? 'selected' : '' }}>Espanhol</option>
                </select>

                @if ($errors->has('idioma'))
                <p class="error">{{ $errors->first('idioma') }}</p>
                @endif
            </div>

            <!-- Campo para o país de origem -->
            <div class="textfield">
                <input type="text" id="paisorigem" name="paisorigem" value="{{$livro->paisorigem}}" placeholder="país origem" required>
                <label for="paisorigem">País de origem</label>

                @if ($errors->has('paisorigem'))
                <p class="error">{{ $errors->first('paisorigem') }}</p>
                @endif
            </div>

            <!-- Campo para o ano de lançamento -->
            <div class="textfield">
                <input type="number" id="anolancamento" name="anolancamento" value="{{$livro->anolancamento}}" placeholder="ano lançamento" required>
                <label for="anolancamento">Ano de Lançamento</label>

                @if ($errors->has('anolancamento'))
                <p class="error">{{ $errors->first('anolancamento') }}</p>
                @endif
            </div>

            <!-- Campo para o preço -->
            <div class="textfield">
                <input type="number" step="0.01" id="preco" name="preco" value="{{$livro->preco}}" placeholder="preço" required>
                <label for="preco">Preço</label>

                @if ($errors->has('preco'))
                <p class="error">{{ $errors->first('preco') }}</p>
                @endif
            </div>

            <!-- Campo para a quantidade -->
            <div class="textfield">
                <input type="number" id="quantidade" name="quantidade" value="{{$livro->quantidade}}" placeholder="quantidade" required>
                <label for="quantidade">quantidade</label>

                @if ($errors->has('quantidade'))
                <p class="error">{{ $errors->first('quantidade') }}</p>
                @endif
            </div>

            <!-- Campo para a imagem -->
            <div class="textfield">
                <input type="file" id="image" name="image" accept="image/*">
                <div class="image">
                    @if (!empty($livro->image))
                    @if ($livro->tipo_image === 'public')
                    <img src="{{ asset($livro->image) }}" alt="Imagem do livro" height="100" width="100">
                    @else
                    <img src="{{ asset('storage/' . $livro->image) }}" alt="Imagem do livro" height="100" width="100">
                    @endif
                    @else
                    <img src="{{ asset('Images/livros/book-cover-default.jpg') }}" alt="Imagem padrão" height="100" width="100">
                    @endif
                </div>


                @if ($errors->has('image'))
                <p class="error">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar categoria" />
            </div>
        </form>
    </div>
</div>
@endsection