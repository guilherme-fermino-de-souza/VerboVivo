<div class="subnav">
    <div class="subnav-container">
        <ul>
            <li class="dropdown">
                <div>
                    <a href="#">Categorias</a>
                    <div class="conteudo-dropdown">
                        <a href="#">Ação</a>
                        <a href="#">Nacionais</a>
                        <a href="#">Drama</a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <div>
                    <a href="#">Literatura</a>
                    <div class="conteudo-dropdown">
                        <a href="#">Infatil</a>
                        <a href="#">Juvenil</a>
                        <a href="#">Didáticos</a>
                        <a href="#">Adultos</a>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <div>
                    <a href="#">Língua Estrangeira</a>
                    <div class="conteudo-dropdown">
                        <a href="#">Livros Em Inglês</a>
                        <a href="#">Livros Em Espanhol</a>
                        <a href="#">Outros Idiomas</a>
                    </div>
                </div>
            </li>
            <li class="subnav-maisvendidos"><a href="#">Mais Vendidos</a></li>
        </ul>
    </div>

    @can('visualizar-admin')
    <div class="admin-part">
        <ul class="admin-subnav">
            <li><a href="{{route('dashboard.index')}}">Admin</a></li>
        </ul>
    </div>

    @endcan
</div>