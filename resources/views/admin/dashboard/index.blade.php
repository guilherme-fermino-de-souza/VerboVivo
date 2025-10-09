@extends('admin.template.layout')

@section('main')
<link rel="stylesheet" href="{{ url('assets/css/dashboard/style.css') }}">

<div class="dashboard-root">
    <div class="dashboard-inner">
        <h1 class="dashboard-title">
            <span class="material-symbols-outlined">monitoring</span>
            Dashboard
        </h1>

        {{-- Cards estatísticos --}}
        <div class="cards-grid">
            <div class="card">
                <h5>Total Usuários</h5>
                <h3>{{ $totalUsuarios }}</h3>
            </div>
            <div class="card">
                <h5>Livros</h5>
                <h3>{{ $totalLivros }}</h3>
            </div>
            <div class="card">
                <h5>Categorias</h5>
                <h3>{{ $totalCategorias }}</h3>
            </div>
            <div class="card">
                <h5>Mensagens</h5>
                <h3>{{ $totalContatos }}</h3>
            </div>
        </div>

        {{-- Gráficos --}}
        <div class="charts-grid">
            <div class="chart-box chart-box--wide">
                <h3 class="chart-title">Novos usuários (últimos 7 dias)</h3>
                <div class="chart-canvas-wrap">
                    <canvas id="usuariosChart"></canvas>
                </div>
            </div>

            <div class="chart-box chart-box--narrow">
                <h3 class="chart-title">Usuários por Tipo</h3>
                <div class="chart-canvas-wrap">
                    <canvas id="usuariosTipoChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="dashboard-data" type="application/json">
{!! json_encode([
    'labels' => $dias,
    'usuariosPorDia' => $usuariosPorDia,
    'usuariosPorTipoKeys' => $usuariosPorTipoNomes->keys()->toArray(),
    'usuariosPorTipoVals' => $usuariosPorTipoNomes->values()->toArray(),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ url('assets/js/dashboard/dashboard.js') }}"></script>
@endsection