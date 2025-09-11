<header>
    <nav>
        <div class="nav-logo">
            <a href="{{route('welcome')}}">
                <h1 class="V">
                    <p>V</p>erbo <p>V</p>ivo
                </h1>
            </a>
        </div>
        <div class="nav-barradebusca">
            <input class="textfield" placeholder="Pesquisa">
        </div>
        <div class="nav-links">
            <li>
                <div class="contato-link-header"><a href="{{route('contato.index')}}">Contatos</a></div>
                <a href="/"><img src="{{ URL('Images/navbar/shopping-cart.png')}}"></a>
                <a href="{{route('profile.edit')}}"><img src="{{ URL('Images/navbar/user-square.png')}}"></a>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="nav-link"
                        href="#">Sair</a>
                </form>
            </li>
        </div>
    </nav>
</header>