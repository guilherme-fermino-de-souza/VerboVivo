@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/categoria/style.css') }}">

<div class="categoria-root">
    <div class="header-categorias">
        <h1>Categorias</h1>
        <button class="btn-adicionar" onclick="abrirModal()">+ Nova Categoria</button>
    </div>

    {{-- Tabela --}}
    <table class="tabela-categorias">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td class="acoes">
                        <a href="{{ route('categoria.edit', $categoria) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('categoria.destroy', $categoria) }}" method="POST" onsubmit="return confirm('Deseja excluir esta categoria?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-excluir" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="paginacao">
        {{ $categorias->links() }}
    </div>

    {{-- Estatísticas --}}
    <div class="estatisticas-grid">
        <div class="card-estatistica">
            <h3>Últimas adicionadas</h3>
            <ul>
                @foreach ($ultimasCategorias as $cat)
                    <li>{{ $cat->categoria }}</li>
                @endforeach
            </ul>
        </div>

        <div class="card-estatistica chart-box">
            <h3>Mais usadas</h3>
            <canvas id="graficoCategorias"></canvas>
        </div>
    </div>
</div>

{{-- Modal de criação --}}
<div id="modal-categoria" class="modal hidden">
    <div class="modal-content">
        <span class="modal-close" onclick="fecharModal()">&times;</span>
        <h2>Nova Categoria</h2>

        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <label for="categoria">Nome da Categoria</label>
            <input type="text" name="categoria" id="categoria" placeholder="Digite o nome..." required>

            <button type="submit" class="btn-salvar">Salvar</button>
        </form>
    </div>
</div>

<script id="chart-data" type="application/json">
{!! json_encode($chartData ?? ['labels'=>[], 'values'=>[]], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>

<script>
    const chartDataEl = document.getElementById('chart-data');
    const chartData = chartDataEl ? JSON.parse(chartDataEl.textContent) : { labels: [], values: [] };
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ url('assets/js/categoria/index.js') }}"></script>
@endsection
