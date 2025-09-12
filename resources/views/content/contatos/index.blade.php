@extends ('content.contatos.template.layout')

@section('content')
<div class="content">
    <h1 class="titulo">Contatos</h1>
    <div class="botao-container">
        <a class="botao-criar" href="{{ route('contato.create') }}">Criar Contato</a>
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
                        <th>Email</th>
                        <th>Nome</th>
                        <th>Assunto</th>
                        <th>Texto</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contatos as $contato)
                    <tr>
                        <td>{{$contato->id}}</td>
                        <td>{{$contato->email}}</td>
                        <td>{{$contato->name}}</td>
                        <td>{{$contato->assunto}}</td>
                        <td>{{$contato->texto}}</td>
                        <td>
                            <a class="btn-editar" href="{{route('contato.edit', ['contato' => $contato])}}">Editar</a> <!--Passa o Objeto pela route até o controller-->
                        </td>
                        <td>
                            <form method="post" action="{{route('contato.destroy', ['contato' => $contato])}}">
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
                {{ $contatos->links() }}
            </div>
        </div>
    </div>
</div>

@endsection