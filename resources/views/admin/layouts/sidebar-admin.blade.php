<div class="content">
    @can("visualizar-admin")

    <div class="texto-superior">
        <h1>Administração</h1>
    </div>

    <div class="admin-topo">
        <img src="{{ Auth::user()->foto ? url('storage/' . Auth::user()->foto) : url('assets/images/logos/contas/user.png') }}"
            alt="foto de perfil"
            style="border-radius: 50%;"
            width="80"
            height="80"
            loading="lazy">
        <div class="text">
            <h1>{{ Auth::user()->name}}</h1>
            <h2>@if(Auth::user()->id === 1) Administrador Chefe @else Administrador Secundario @endif</h2>
        </div>
    </div>

    <!--<img src="{{ asset('assets/images/logos/symbols/site-claro/' . (request()->routeIs('dashboard.index') ? 'statisctics-preenchido.png' : 'statisctics.png')) }}" alt="usuarios">-->

    <div class="links">
        <a href="{{ route('dashboard.index')}}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" id="dashboard">
            <span class="material-symbols-outlined">monitoring</span>
            <h1>Estatísticas</h1>
        </a>


        <a href="{{ route('admin.index')}}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}" id="dashboard">
            <span class="material-symbols-outlined">manage_accounts</span>
            <h1>Admins</h1>
        </a>

        <a href="{{ route('categoria.index')}}" class="nav-link {{ request()->routeIs('categoria.index') ? 'active' : '' }}" id="dashboard">
            <span class="material-symbols-outlined">category</span>
            <h1>Categorias</h1>
        </a>

        <a href="{{ route('contato.index')}}" class="nav-link {{ request()->routeIs('contato.index') ? 'active' : '' }}" id="dashboard">
            <span class="material-symbols-outlined">chat</span>
            <h1>Contatos</h1>
        </a>

        <a href="{{ route('livro.index')}}" class="nav-link {{ request()->routeIs('livro.index') ? 'active' : '' }}" id="dashboard">
            <span class="material-symbols-outlined">book_4</span>
            <h1>Livros</h1>
        </a>

        <a href="{{ route('welcome') }}" class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" id="feed">
            <span class="material-symbols-outlined">arrow_back</span>
            <h1>Voltar</h1>
        </a>
    </div>
    @endcan
</div>