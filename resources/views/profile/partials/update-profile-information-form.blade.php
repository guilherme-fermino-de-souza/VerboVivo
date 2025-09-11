<section class="perfil-section">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Atualize as informações do seu perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ $user->name ?? old('name') }}" required autofocus autocomplete="name" />
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ $user->email ?? old('email') }}" required autocomplete="username" />


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Seu endereço de email não é verificado.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Clique aqui para enviar o e-mail de verificação.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600">
                    {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="tipo_usuario" class="form-label">Tipo de Conta</label>
            <input id="tipo_usuario" name="tipo_usuario" type="text" class="form-control"
                value="@switch($user->tipo_usuario)
                @case(1) Admin @break
                @case(2) Consumidor @break
               @endswitch"
                readonly />
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input id="cpf" name="cpf" type="text" class="form-control" value="{{ $user->cpf ?? old('cpf')}}" autocomplete="cpf" />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input id="cep" name="cep" type="text" class="form-control" value="{{ $user->cep ?? old('cep')}}" autocomplete="cep" />
            <x-input-error class="mt-2" :messages="$errors->get('cep')" />
        </div>

        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data Nascimento</label>
            <input id="data_nascimento" name="data_nascimento" type="date" class="form-control" value="{{ $user->data_nascimento ?? old('data_nascimento')}}" required autocomplete="data_nascimento" />
            <x-input-error class="mt-2" :messages="$errors->get('data_nascimento')" />
        </div>

        <div class="mb-3">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input id="logradouro" name="logradouro" type="text" class="form-control" value="{{ $user->logradouro ?? old('logradouro')}}" autocomplete="logradouro" />
            <x-input-error class="mt-2" :messages="$errors->get('logradouro')" />
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input id="endereco" name="endereco" type="text" class="form-control" value="{{ $user->endereco ?? old('endereco')}}" autocomplete="endereco" />
            <x-input-error class="mt-2" :messages="$errors->get('endereco')" />
        </div>

        <div class="mb-3">
            <label for="rua" class="form-label">Rua</label>
            <input id="rua" name="rua" type="text" class="form-control" value="{{ $user->rua ?? old('rua')}}" autocomplete="rua" />
            <x-input-error class="mt-2" :messages="$errors->get('rua')" />
        </div>

        <div class="mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input id="bairro" name="bairro" type="text" class="form-control" value="{{ $user->bairro ?? old('bairro')}}" autocomplete="bairro" />
            <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número</label>
            <input id="numero" name="numero" type="text" class="form-control" value="{{ $user->numero ?? old('numero')}}" autocomplete="numero" />
            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
        </div>

        <div class="mb-3">
            <label for="Cidade" class="form-label">Cidade</label>
            <input id="cidade" name="cidade" type="text" class="form-control" value="{{ $user->cidade ?? old('cidade')}}" autocomplete="cidade" />
            <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input id="estado" name="estado" type="text" class="form-control" value="{{ $user->estado ?? old('estado')}}" autocomplete="estado" />
            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
        </div>

        <div class="mb-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input id="complemento" name="complemento" type="text" class="form-control" value="{{ $user->complemento ?? old('complemento')}}" autocomplete="complemento" />
            <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
        </div>

        <div class="flex">
            <button type="submit" class="btn-primary">{{ __('Salvar') }}</button>
            @if (session('status') === 'profile-updated')
            <p class="text-success">{{ __('Informações atualizadas com sucesso.') }}</p>
            @endif
        </div>

    </form>
</section>