<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desenvolvimento com Framework</title>

        <link href="{{ asset('/css/bootstrap.sandstone.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/sticky-footer.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        
        <script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Exemplo: @yield('sample.feature')</a>
                </div>

                @yield('menu')

            </div>
        </nav>
        

        <div class="container-fluid">
            <h2 class="page-header">@yield('sample.title')</h2>
            @yield('content')
        </div>

        <footer class="footer">
            <div class="container-fluid small">
                Ademir Mazer Jr - ademir.mazer.jr@gmail.com - @nunomazer - http://ademir.winponta.com.br
                <br/>
                Exemplos utilizado nas aulas de Desenvolvimento com Framework:
                <br/>
                {!! Html::link('ola', 'Ola') !!} | 
                {!! Html::link('olavisao', 'Ola visão') !!} | 
                {!! Html::link('suporte', 'Suporte') !!} | 
            </div>
        </footer>
    </body>
</html>
