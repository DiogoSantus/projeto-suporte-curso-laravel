<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Desenvolvimento com Framework</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="header">
        <h1>Exemplo: @yield('sample.feature')</h1>
    
        <h2>@yield('sample.title')</h2>
    </div>
    
    @yield('menu')
    
    <div class="content">
	   @yield('content')
    </div>
    
    
    <footer>
        <p>Ademir Mazer Jr - ademir.mazer.jr@gmail.com - @nunomazer - http://ademir.winponta.com.br</p>
        <p>Exemplos utilizado nas aulas de Desenvolvimento com Framework: </p>
        <p>
            {!! Html::link('ola', 'Ola') !!} | 
            {!! Html::link('olavisao', 'Ola visão') !!} | 
            {!! Html::link('suporte', 'Suporte') !!} | 
        </p>
    </footer>
</body>
</html>
