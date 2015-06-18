@if (count($errors) > 0)
<!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
    <div class='msg-erro'>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('mensagem-sucesso'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-sucesso -->
    <div class='msg-sucesso'>
        {{Session::get('mensagem-sucesso')}}
    </div>
@endif