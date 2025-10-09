@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/livros/style.css') }}">

<div class="livros-root">
    <div class="livros-header">
        <h1 class="livros-title">
            <img src="{{ asset('assets/images/logos/symbols/books.png') }}" alt="Livros"> Livros
        </h1>
        <button class="btn-add" onclick="abrirModalLivro()">+ Adicionar Livro</button>
    </div>

    <div class="livros-table-wrapper">
        <table class="livros-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Idioma</th>
                    <th>Preço</th>
                    <th>Qtd</th>
                    <th>Categorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($livros as $livro)
                    <tr>
                        <td>{{ $livro->id }}</td>
                        <td>
                            <img src="{{ $livro->tipo_image === 'storage' ? asset('storage/'.$livro->image) : asset($livro->image) }}" 
                                 alt="{{ $livro->titulo }}" class="capa-mini">
                        </td>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->idioma }}</td>
                        <td>R$ {{ number_format($livro->preco, 2, ',', '.') }}</td>
                        <td>{{ $livro->quantidade }}</td>
                        <td>
                            @foreach ($livro->categorias as $cat)
                                <span class="categoria-tag">{{ $cat->categoria }}</span>
                            @endforeach
                        </td>
                        <td class="acoes">
                            <a href="{{ route('livro.edit', $livro->id) }}" class="btn-edit">✏️</a>
                            <form action="{{ route('livro.destroy', $livro->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este livro?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-del">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" class="empty">Nenhum livro cadastrado.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $livros->links() }}
        </div>
    </div>
</div>

{{-- Modal Criar Livro --}}
<div id="modal-livro" class="modal hidden">
    <div class="modal-content">
        <h2>Adicionar Novo Livro</h2>
        <form action="{{ route('livro.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <label>Título</label>
                <input type="text" name="titulo" required>

                <label>Descrição</label>
                <textarea name="descricao" rows="3" required></textarea>

                <label>Autor</label>
                <input type="text" name="autor" required>

                <label>Idioma</label>
                <input type="text" name="idioma" required>

                <label>País de Origem</label>
                <input type="text" name="paisorigem" required>

                <label>Ano de Lançamento</label>
                <input type="number" name="anolancamento" min="500" max="{{ date('Y') }}">

                <label>Preço</label>
                <input type="number" name="preco" step="0.01" required>

                <label>Quantidade</label>
                <input type="number" name="quantidade" min="0" required>

                <label>Imagem (opcional)</label>
                <input type="file" name="image" accept="image/*">

                <label>Categorias</label>
                <select name="categorias[]" multiple>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <button type="button" class="btn-cancel" onclick="fecharModalLivro()">Cancelar</button>
                <button type="submit" class="btn-save">Salvar</button>
            </div>
        </form>
    </div>
</div>

<script>
function abrirModalLivro() {
    document.getElementById('modal-livro').classList.remove('hidden');
}
function fecharModalLivro() {
    document.getElementById('modal-livro').classList.add('hidden');
}
</script>
@endsection
