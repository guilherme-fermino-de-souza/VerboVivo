@extends ('templates.template')
@section('content')
<h1>contatos</h1>
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
                @foreach($contatos as $contato)
                <tr>
                    <td>{{$contato->id}}</td>
                    <td>{{$contato->email}}</td>
                    <td>{{$contato->name}}</td>
                    <td>{{$contato->assunto}}</td>
                    <td>{{$contato->texto}}</td>
                    <td>
                        <a href="{{route('contato.edit', ['contato' => $contato])}}">Edit</a> <!--Passa o Objeto pela route até o controller-->
                    </td>
                    <td>
                        <form method="post" action="{{route('contato.destroy', ['contato' => $contato])}}">
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