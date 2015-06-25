@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('content')

@section('menu')@include('suporte.menu')@stop

<h3>
    Listagem de produtos
</h3>
@include('layout.mensagens')

<!-- o helper abaixo cria o link completo em HTML
primeiro parâmetro para a url, segundo para o título, terceiro para os parâmetros na url -->

<table class="table table-hover table-striped">
    <caption>
        Produtos - 
        <a href="{{ url('produto/create') }}" class="btn btn-primary btn-sm">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> criar novo 
        </a>
    </caption>
    <thead>
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($produtos as $p)
    <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->nome}}</td>
        <td>
            <a href="{{ url('produto/'.$p->id . '/edit') }}" class="btn btn-info btn-sm">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> editar 
            </a>
            <a href="{{ url('produto/'.$p->id . '/excluir') }}" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> excluir 
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

