@extends ('content.categorias.template.layout')

@section('content')
<div class="content">
    <h1 class="titulo">Categorias</h1>
    <div class="botao-container">
        <a class="botao-criar" href="{{ route('categoria.create') }}">Criar Categoria</a>
    </div>

    <div>
        @if(session()->has('success'))
        <div class="alerta-sucesso">
            {{ session('success') }}
        </div>
        @endif
    </div>

    <div class="container-index">
        <div class="container-index-conteudo">
            <table class="index-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->categoria }}</td>
                        <td>
                            <a class="btn-editar" href="{{ route('categoria.edit', $cat) }}">Editar</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('categoria.destroy', $cat) }}">
                                @csrf
                                @method('delete')
                                <input class="btn-deletar" type="submit" value="Deletar">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Links de paginação -->
            <div class="paginacao">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
</div>

@endsection