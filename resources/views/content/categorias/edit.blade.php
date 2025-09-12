@extends ('content.categorias.template.layout')

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
        <form method="post" action="{{route('categoria.update', ['categoria' => $categoria])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="text" id="categoria" name="categoria" value="{{$categoria->categoria}}" required>
                <label for="categoria">Nome da categoria</label>
            </div>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar categoria" />
            </div>
        </form>
    </div>
</div>
@endsection