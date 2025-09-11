@extends ('templates.template')
@section('content')
<h1>conta</h1>
<div>
    @if(session()->has('success'))
    <div>
        {{session('success')}}
    </div>
    @endif
</div>
<div>
    <div>
        <a href="{{route('conta.create')}}">Create</a>
        <a href="{{route('welcome')}}">Home</a>
    </div>
    <div class="container-index">
        <div class="container-index-conteudo">
            <table class="index-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Tipo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($criarconta as $conta)
                <tr>
                    <td>{{$conta->id}}</td>
                    <td>{{$conta->nome}}</td>
                    <td>{{$conta->email}}</td>
                    <td>{{$conta->senha}}</td>
                    <td>{{$conta->tipo}}</td>
                    <td>
                        <a href="{{route('conta.edit', ['conta' => $conta])}}">Edit</a> <!--Passa o Objeto pela route até o controller-->
                    </td>
                    <td>
                        <form method="post" action="{{route('conta.destroy', ['conta' => $conta])}}">
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