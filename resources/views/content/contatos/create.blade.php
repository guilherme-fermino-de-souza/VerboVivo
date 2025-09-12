<div class="container-create">
    <div class="container-create-conteudo">
        <h1>Entre em Contato</h1>
        <form action="{{route('contato.store')}}" method="post">
            <input type="hidden" name="email" value="{{ Auth::user()->email }}" required>
            <input type="hidden" name="name" value="{{ Auth::user()->name }}" required>
            @csrf
            <div class="textfield">
                <input type="text" id="assunto" name="assunto" required>
                <label for="assunto">Assunto da mensagem</label>
            </div>

            <div class="textfield">
                <textarea id="texto" name="texto" rows="3" required
                   style="width: 100%; max-width: 100%; max-width: 90%; min-height: 50%; max-height: 100px;"></textarea>
                <label for="texto">Digite sua mensagem</label>
            </div>


            <div class="textfield-botao">
                <input class="btn-salvar" type="submit" value="Salvar contato" />
            </div>
        </form>
    </div>
</div>