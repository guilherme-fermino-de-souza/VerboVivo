@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/contato/style.css') }}">

<div class="contato-root">
    <h1 class="titulo-contato">Mensagens de Contato</h1>

    <table class="tabela-contatos">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Assunto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->name }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->assunto }}</td>
                    <td>
                        <button 
                            class="btn-vermais"
                            data-nome="{{ $contato->name }}"
                            data-email="{{ $contato->email }}"
                            data-assunto="{{ $contato->assunto }}"
                            data-texto="{{ $contato->texto }}"
                            onclick="abrirModal(this)">
                            Ver mais
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="paginacao">
        {{ $contatos->links() }}
    </div>
</div>

{{-- Modal --}}
<div id="modal-contato" class="modal hidden">
    <div class="modal-content">
        <span class="modal-close" onclick="fecharModal()">&times;</span>
        <h2 id="modal-assunto"></h2>
        <p><strong>Nome:</strong> <span id="modal-nome"></span></p>
        <p><strong>Email:</strong> <span id="modal-email"></span></p>
        <p><strong>Mensagem:</strong></p>
        <p id="modal-texto"></p>

        <form method="POST" action="{{ route('contato.responder') }}">
            @csrf
            <input type="hidden" name="email" id="resposta-email">
            <textarea name="mensagem" placeholder="Digite sua resposta..." required></textarea>
            <button type="submit" class="btn-responder">Enviar resposta</button>
        </form>
    </div>
</div>

<script src="{{ url('assets/js/contato/index.js') }}"></script>
@endsection
