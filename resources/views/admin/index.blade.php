@extends ('admin.admintemplate')
@section('content')
    <div class="container-admin">
        <h2>Conteudo</h2>
        <div class="conteudo-admin">
            <div class="button-admin">
                <a href="{{route('contato.index')}}">Tabela Contatos</a>
            </div>
            <div class="button-admin">
                <a href="">Tabelas Contas</a>
            </div>
        </div>
    </div>
@endsection