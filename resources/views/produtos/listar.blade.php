@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('content')

@section('menu')@include('suporte.menu')@stop

<h3>
    Listagem de produtos
</h3>

<!-- o helper abaixo cria o link completo em HTML
primeiro parâmetro para a url, segundo para o título, terceiro para os parâmetros na url -->
{!! link_to('produto/create','Novo produto') !!}

@if (Session::has('mensagem-erro'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
    <div class='msg-erro'>
        {{Session::get('mensagem-erro')}}
    </div>
@endif
@if (Session::has('mensagem-sucesso'))
    <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-sucesso -->
    <div class='msg-sucesso'>
        {{Session::get('mensagem-sucesso')}}
    </div>
@endif

<table>
    <caption>Produtos</caption>
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
            <!-- o helper abaixo cria o link completo em HTML
            primeiro parâmetro para a url, segundo para o título, terceiro para os parâmetros na url -->
            {!! link_to('produto/'.$p->id . '/edit', 'Editar') !!}
            {!! link_to('produto/'.$p->id . '/excluir', 'Excluir') !!}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

