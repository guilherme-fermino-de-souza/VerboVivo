@extends('admin.template.layout')

@section('main')
<div class="usuario-gerenciamento">
    <div class="usuario-inner">
        <div class="title">
            <span class="material-symbols-outlined">manage_accounts</span>
            <h1>Administradores</h1>
        </div>

        <!-- Filtros -->
        <form method="GET" action="{{ route('admin.index') }}" class="filtro-form">
            <input type="text" name="search" placeholder="Buscar por nome ou email" value="{{ request('search') }}">
            <select name="ordem">
                <option value="desc" {{ request('ordem') == 'desc' ? 'selected' : '' }}>Mais recente</option>
                <option value="asc" {{ request('ordem') == 'asc' ? 'selected' : '' }}>Mais antigo</option>
            </select>
            <button type="submit" class="btn-filtrar">Filtrar</button>
            <a href="{{ route('admin.create') }}" class="btn-novo">+ Novo Admin</a>
        </form>

        <!-- Lista -->

        <table class="table-usuarios">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('admin.destroy', $admin->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir este admin?')" class="btn-excluir-usuario">
                                <span class="material-symbols-outlined">
                                    account_circle_off
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Nenhum administrador encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="paginacao">
            {{ $admins->links() }}
        </div>
    </div>
</div>
@endsection