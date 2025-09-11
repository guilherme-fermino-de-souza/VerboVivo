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
        <form method="post" action="{{route('contato.update', ['contato' => $contato])}}">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="email" id="email" name="email" required placeholder="Seu e-mail" value="{{$contato->email}}">
            </div>

            <div class="textfield">
                <input type="text" id="name" name="name" required placeholder="Seu nome" value="{{$contato->name}}">
            </div>

            <div class="textfield">
                <input type="text" id="assunto" name="assunto" required placeholder="Assunto da mensagem" value="{{$contato->assunto}}">
            </div>

            <div class="textfield">
                <textarea id="mensagem" name="texto" rows="2" required placeholder="Digite sua mensagem">{{$contato->texto}}</textarea>
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