@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/categoria/style.css') }}">

<div class="categoria-root">
    <div class="categoria-inner">
        <div class="header-categorias">
            <div class="title">
                <span class="material-symbols-outlined">category</span>
                <h1>Categorias</h1>
            </div>

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

{{-- Primeiro, carregue o Chart.js antes de usar --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script id="chart-data" type="application/json">
    {!! json_encode($chartData ?? ['labels' => [], 'values' => []], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const chartDataElement = document.getElementById("chart-data");
    const chartData = chartDataElement ? JSON.parse(chartDataElement.textContent) : { labels: [], values: [] };

    if (chartData.labels.length) {
        const ctx = document.getElementById("graficoCategorias").getContext('2d');
        new Chart(ctx, {
            type: "pie",
            data: {
                labels: chartData.labels,
                datasets: [{
                    data: chartData.values,
                    backgroundColor: ["#D92B4B","#A62E66","#27498C","#D9CD23","#BF8A26"],
                    borderColor: "#262626",
                    borderWidth: 2
                }]
            },
            options: {
                plugins: {
                    legend: {
                        labels: { color: "#0D0D0D", font: { size: 13 } }
                    }
                }
            }
        });
    }
});
</script>


<script src="{{ url('assets/js/categoria/index.js') }}"></script>
@endsection