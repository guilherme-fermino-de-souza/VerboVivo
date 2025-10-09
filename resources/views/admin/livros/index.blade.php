@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/livros/style.css') }}">

<div class="livros-root">
    <div class="livros-inner">
        <div class="livros-header">
            <div class="title">
                <span class="material-symbols-outlined">book_4</span>
                <h1>Livros</h1>
            </div>
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
                            <a href="{{ route('livro.edit', $livro->id) }}" class="btn-edit"><span class="material-symbols-outlined">edit</span></a>
                            <form action="{{ route('livro.destroy', $livro->id) }}" method="POST" onsubmit="return confirm('Deseja excluir este livro?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-del"><span class="material-symbols-outlined">delete</span></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="empty">Nenhum livro cadastrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="pagination">
                {{ $livros->links() }}
            </div>
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
                <div class="form-left">
                    <div class="textfield">
                        <label>Título</label>
                        <input type="text" name="titulo" placeholder="Título">

                        @if ($errors->has('titulo'))
                        <p class="error">{{ $errors->first('titulo') }}</p>
                        @endif
                    </div>


                    <div class="textfield">
                        <label>Descrição</label>
                        <textarea name="descricao" rows="3"></textarea>

                        @if ($errors->has('descricao'))
                        <p class="error">{{ $errors->first('descricao') }}</p>
                        @endif
                    </div>
                    <div class="textfield">
                        <label>Autor</label>
                        <input type="text" name="autor" placeholder="Autor">

                        @if ($errors->has('autor'))
                        <p class="error">{{ $errors->first('autor') }}</p>
                        @endif
                    </div>

                    <div class="textfield">
                        <label>Idioma</label>
                        <select id="idioma" name="idioma" required>
                            <option value="portugues">Português</option>
                            <option value="ingles">Inglês</option>
                            <option value="espanhol">Espanhol</option>
                        </select>

                        @if ($errors->has('idioma'))
                        <p class="error">{{ $errors->first('idioma') }}</p>
                        @endif
                    </div>

                    <div class="textfield">
                        <label>País de Origem</label>
                        <input type="text" name="paisorigem" placeholder="Brasil">

                        @if ($errors->has('paisorigem'))
                        <p class="error">{{ $errors->first('paisorigem') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-right">
                    <div class="textfield">
                        <label for="anolancamento">Ano Lançamento</label>
                        <input type="number" id="anolancamento" name="anolancamento" placeholder="1999">

                        @if ($errors->has('anolancamento'))
                        <p class="error">{{ $errors->first('anolancamento') }}</p>
                        @endif
                    </div>

                    <div class="textfield">
                        <label for="preco">Preço</label>
                        <input type="number" step="0.01" id="preco" name="preco" placeholder="24.22">

                        @if ($errors->has('preco'))
                        <p class="error">{{ $errors->first('preco') }}</p>
                        @endif
                    </div>

                    <div class="textfield">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" placeholder="120">

                        @if ($errors->has('quantidade'))
                        <p class="error">{{ $errors->first('quantidade') }}</p>
                        @endif
                    </div>

                    <div class="textfield-file">
                        <label for="image">image</label>
                        <input type="file" id="image" name="image" accept="image/*" required>

                        @if ($errors->has('image'))
                        <p class="error">{{ $errors->first('image') }}</p>
                        @endif
                    </div>

                    <label>Categorias</label>
                    <div class="categorias-checklist">
                        @foreach ($categorias as $categoria)
                        <label>
                            <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}">
                            {{ $categoria->categoria }}
                        </label>
                        @endforeach
                    </div>
                </div>
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