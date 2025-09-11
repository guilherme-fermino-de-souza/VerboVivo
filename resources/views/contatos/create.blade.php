<div class="container-crete">
    <div class="container-create-conteudo">
        <h1>Entre em Contato</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form action="{{route('contato.store')}}" method="post">
            @csrf
            @method('post')

            <input type="hidden" name="email" value="{{ Auth::user()->email }}" required>
            <input type="hidden" name="name"  value="{{ Auth::user()->name }}"required>

            <div class="textfield">
                <input type="text" id="assunto" name="assunto" required>
                <label for="assunto">Assunto da mensagem</label>
            </div>

            <div class="textfield">
                <textarea id="texto" name="texto" rows="2" required></textarea>
                <label for="texto">Digite sua mensagem</label>
            </div>

            <div class="textfield-botao">
                <div class="textfield-botao-submit">
                    <input type="submit" value="Enviar" />
                </div>
            </div>
        </form>
    </div>
</div>