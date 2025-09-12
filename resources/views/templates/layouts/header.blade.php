<header>
    <nav class="nav-principal">
        <div class="nav-logo">
            <a class="logo" href="{{route('welcome')}}">
                <img class="logo" src="{{ asset('/Images/logos/verbovivo/verbo-vivo.png') }}">
            </a>
        </div>

        <div class="nav-barradebusca">
            <input class="textfield" placeholder="Pesquisa">
        </div>

        <div class="nav-links">
            <li>
                @if(Auth::check())
                <a href="{{route('profile.edit')}}">Conta</a>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="nav-link"
                        href="#">Sair</a>
                </form>
                @else
                <a href="{{ route('login') }}">Entrar</a>
                @endif
            </li>
        </div>
    </nav>
</header>