@extends ('content.livros.template.layout')

@section('content')
<div class="container-create">
    <div class="container-titulo">
        <h1>Create Livro</h1>
    </div>
    <div class="container-create-conteudo">
        <form method="post" action="{{route('livro.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Campo para o título -->
            <div class="textfield">
                <input type="text" id="titulo" name="titulo" required>
                <label for="titulo">Título</label>

                @if ($errors->has('titulo'))
                <p class="error">{{ $errors->first('titulo') }}</p>
                @endif
            </div>

            <!-- Campo para a descrição -->
            <div class="textfield">
                <input type="text" id="descricao" name="descricao" required>
                <label for="descricao">Descrição</label>

                @if ($errors->has('descricao'))
                <p class="error">{{ $errors->first('descricao') }}</p>
                @endif
            </div>

            <!-- Campo para o autor -->
            <div class="textfield">
                <input type="text" id="autor" name="autor" required>
                <label for="autor">Autor</label>

                @if ($errors->has('autor'))
                <p class="error">{{ $errors->first('autor') }}</p>
                @endif
            </div>

            <!-- Campo para o Idioma -->
            <div class="textfield">
                <select id="idioma" name="idioma" required>
                    <option value="portugues">Português</option>
                    <option value="ingles">Inglês</option>
                    <option value="espanhol">Espanhol</option>
                </select>

                @if ($errors->has('idioma'))
                <p class="error">{{ $errors->first('idioma') }}</p>
                @endif
            </div>

            <!-- Campo para o País de Origem -->
            <div class="textfield">
                <input type="text" id="paisorigem" name="paisorigem" required>
                <label for="paisorigem">País de Origem</label>

                @if ($errors->has('paisorigem'))
                <p class="error">{{ $errors->first('paisorigem') }}</p>
                @endif
            </div>

            <!-- Campo para o ano de lançamento -->
            <div class="textfield">
                <input type="number" id="anolancamento" name="anolancamento" required>
                <label for="anolancamento">Ano Lançamento</label>

                @if ($errors->has('anolancamento'))
                <p class="error">{{ $errors->first('anolancamento') }}</p>
                @endif
            </div>

            <!-- Campo para o preço -->
            <div class="textfield">
                <input type="number" step="0.01" id="preco" name="preco" required>
                <label for="preco">Preço</label>

                @if ($errors->has('preco'))
                <p class="error">{{ $errors->first('preco') }}</p>
                @endif
            </div>

            <!-- Campo para a quantidade -->
            <div class="textfield">
                <input type="number" id="quantidade" name="quantidade" required>
                <label for="quantidade">Quantidade</label>

                @if ($errors->has('quantidade'))
                <p class="error">{{ $errors->first('quantidade') }}</p>
                @endif
            </div>

            <!-- Campo para a imagem -->
            <div class="textfield-file">
                <input type="file" id="image" name="image" accept="image/*" required>

                @if ($errors->has('image'))
                <p class="error">{{ $errors->first('image') }}</p>
                @endif
            </div>

            <!-- Checkboxes -->
            <fieldset class="fieldCheckbox">
                <legend class="font-semibold">Categorias Livro</legend>
                @foreach ($categorias as $categoria)
                <div class="checkboxContainer">
                    <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}" id="{{ $categoria->id }}" class="checkboxInput">
                    <label for="{{ $categoria->id }}">{{ $categoria->categoria }}</label>
                </div>
                @endforeach
            </fieldset>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar categoria" />
            </div>
        </form>
    </div>
</div>
@endsection