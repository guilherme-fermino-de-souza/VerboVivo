@extends ('content.contatos.template.layout')

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
        <form method="post" action="{{route('contato.update', ['contato' => $contato])}}">
            @csrf
            @method('put')
            <div class="textfield">
                <input type="email" id="email" name="email" required placeholder="Seu e-mail" value="{{$contato->email}}">
                <label for="email">email</label>
            </div>

            <div class="textfield">
                <input type="text" id="name" name="name" required placeholder="Seu nome" value="{{$contato->name}}">
                <label for="name">Nome</label>
            </div>

            <div class="textfield">
                <input type="text" id="assunto" name="assunto" required placeholder="Assunto da mensagem" value="{{$contato->assunto}}">
                <label for="assunto">Assunto</label>
            </div>

            <div class="textfield">
                <textarea id="mensagem" name="texto" rows="2"  style="width: 100%; max-width: 100%; max-width: 90%; min-height: 50%; max-height: 100px;" required placeholder="Digite sua mensagem">{{$contato->texto}}</textarea>
                <label for="mensagem">Mensagem</label>
            </div>

            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar livro" />
            </div>
        </form>
    </div>
</div>
@endsection