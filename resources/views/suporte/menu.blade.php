<div id="navbar" class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Solicitações <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('suporte/list') }}">Listar solicitações</a></li>
                <li><a href="{{ url('suporte/create') }}">Nova solicitação</a></li>
            </ul>
        </li>
        <li><a href="{{ url('produto') }}">Produtos</a></li>
    </ul>
</div><!--/.nav-collapse -->