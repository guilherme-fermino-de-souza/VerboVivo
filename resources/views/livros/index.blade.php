@extends ('templates.template')
@section('content')
<h1>Livros</h1>
<div>
    @if(session()->has('success'))
    <div>
        {{session('success')}}
    </div>
    @endif
</div>
<div>
    <div>
        <a href="{{route('livro.create')}}">Create Livro</a>
        <a href="{{route('welcome')}}">Home</a>
    </div>
    <div class="container-index">
        <div class="container-index-conteudo">
            <table class="index-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descricao</th>
                        <th>Autor</th>
                        <th>Idioma</th>
                        <th>País de Origem</th>
                        <th>Ano de Lançamento</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Categorias</th>
                        <th>Capa</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->id }}</td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->idioma }}</td>
                    <td>{{ $livro->paisorigem }}</td>
                    <td>{{ $livro->anolancamento }}</td>
                    <td>{{ $livro->preco }}</td>
                    <td>{{ $livro->quantidade }}</td>
                    <td>
                        @foreach ($livro->categorias as $categoria)
                        <p>{{ $categoria->categoria }}</p>
                        @endforeach
                    </td>
                    <td>
                        <div class="index.conteudo-livro-image">
                            @if (!empty($livro->image))
                            {{-- Se tiver imagem cadastrada --}}
                            <img src="{{ asset('storage/' . $livro->image) }}"
                                alt="Imagem do livro"
                                height="100"
                                width="100">
                            @else
                            {{-- Se não tiver imagem cadastrada --}}
                            <img src="{{ asset('Images/livros/book-cover-default.jpg') }}"
                                alt="Imagem padrão"
                                height="100"
                                width="100">
                            @endif
                        </div>
                    </td>
                    <td>
                        <a href="{{route('livro.edit', ['livro' => $livro])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('livro.destroy', ['livro' => $livro])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endsection