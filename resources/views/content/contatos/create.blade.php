<div class="container-create">

    <div class="container-create-mapa">
        <div class="info-mapa-contato">
            <h1>Nossa Sede</h1>
            <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.431335149371!2d-46.40218112593123!3d-23.552947178805574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce65086cafaf55%3A0xf7da96815e7611da!2sEscola%20T%C3%A9cnica%20Estadual%20de%20Guaianazes!5e0!3m2!1spt-BR!2sbr!4v1758999037621!5m2!1spt-BR!2sbr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    <div class="container-create-conteudo">
        <h1>Entre em Contato</h1>
        <form action="{{route('contato.store')}}" method="post">
            <input type="hidden" name="email" value="{{ Auth::user()->email }}" required>
            <input type="hidden" name="name" value="{{ Auth::user()->name }}" required>
            @csrf
            <div class="textfield">
                <input type="text" id="assunto" name="assunto" required maxlength="70">
                <label for="assunto">Assunto da mensagem</label>
            </div>

            <div class="textfield">
                <textarea id="texto" name="texto" required maxlength="700"></textarea>
                <label for="texto">Mensagem</label>
            </div>


            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar contato" />
            </div>
        </form>
    </div>
</div>