@extends ('templates.template')
@section('content')
<div class="container-crete">
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
        <form method="post" action="{{route('conta.update', ['conta' => $criarconta])}}">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="text" id="nome" name="nome" required placeholder="Seu nome" value="{{$criarconta->nome}}">
            </div>

            <div class="textfield">
                <input type="email" id="email" name="email" required placeholder="Seu e-mail" value="{{$criarconta->email}}">
            </div>

            <div class="textfield">
                <input type="text" id="senha" name="senha" required placeholder="senha" value="{{$criarconta->senha}}">
            </div>

            <div class="textfield">
                <select id="tipo" name="tipo" required>
                    <option value="usuario">Usuário</option>
                    <option value="vendedor">Vendedores</option>
                </select>
            </div>

            <div class="textfield-botao">
                <div class="textfield-botao-submit">
                    <input type="submit" value="Atualizar" />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection