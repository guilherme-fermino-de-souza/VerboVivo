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
        @can('visualizar-admin')
            <ul class="admin-subnav">
                    <li><a href="{{route('livros.index')}}">Livros</a></li>
                    <li><a href="{{route('livro.create')}}">Livro</a></li>
                    <li><a href="{{route('categoria.index')}}">Categorias</a></li>
                    <li><a href="{{route('categoria.create')}}">Categoria</a></li>
            </ul>
        @endcan
    </div>
</div>