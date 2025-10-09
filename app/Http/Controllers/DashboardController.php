<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Livro;
use App\Models\Categoria;
use App\Models\Contato;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Totais simples
        $totalUsuarios = User::count();
        $totalLivros = Livro::count();
        $totalCategorias = Categoria::count();
        $totalContatos = Contato::count();

        // Usuários hoje, semana, mês
        $usuariosHoje = User::whereDate('created_at', Carbon::today())->count();

        $usuariosSemana = User::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $usuariosMes = User::whereMonth('created_at', Carbon::now()->month)->count();

        // Gráfico dos últimos 7 dias
        $dias = collect();
        $usuariosPorDia = collect();

        for ($i = 6; $i >= 0; $i--) {
            $dia = Carbon::today()->subDays($i)->format('Y-m-d');
            $dias->push(Carbon::today()->subDays($i)->format('d/m'));

            $usuariosPorDia->push(
                User::whereDate('created_at', $dia)->count()
            );
        }

        // Gráfico de pizza: usuários por tipo
        $usuariosPorTipo = User::select('tipo_usuario')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('tipo_usuario')
            ->pluck('total', 'tipo_usuario');

        $mapaTipos = [
            1 => 'Administrador',
            2 => 'Cliente',
            3 => 'Outro',
        ];

        $usuariosPorTipoNomes = collect($usuariosPorTipo)->mapWithKeys(function ($total, $tipo) use ($mapaTipos) {
            return [$mapaTipos[$tipo] ?? "Tipo {$tipo}" => $total];
        });

        return view('admin.dashboard.index', compact(
            'totalUsuarios',
            'totalLivros',
            'totalCategorias',
            'totalContatos',
            'usuariosHoje',
            'usuariosSemana',
            'usuariosMes',
            'dias',
            'usuariosPorDia',
            'usuariosPorTipoNomes'
        ));
    }
}
