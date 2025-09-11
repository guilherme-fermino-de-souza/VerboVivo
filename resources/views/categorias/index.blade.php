@extends ('templates.template')
@section('content')
<h1>Categorias</h1>
<div>
    @if(session()->has('success'))
    <div>
        {{session('success')}}
    </div>
    @endif
</div>
<div>
    <div class="container-index">
        <div class="container-index-conteudo">
            <table class="index-table">
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($categoria as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td>
                        <a href="{{route('categoria.edit', ['categoria' => $categoria])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('categoria.destroy', ['categoria' => $categoria])}}">
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