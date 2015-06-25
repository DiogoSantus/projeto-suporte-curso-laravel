@extends('layout.master')

@section('sample.feature', 'Twitter Bootstrap')
@section('sample.title', 'Suporte')

@section('content')

@section('menu')@include('suporte.menu')@stop

<h3>
    Listagem de solicitações recebidas
</h3>

<table class="table table-hover table-striped">
    <caption>Solicitações - 
        <a href="{{ url('suporte/create') }}" class="btn btn-primary btn-sm">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> criar nova
        </a>
    </caption>
    <thead>
        <tr>
            <th>id</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
    @foreach($suportes as $s)
    <tr>
        <td>{{$s->id}}</td>
        <td>{{$s->data}}</td>
        <td>{{$s->nome}}</td>
        <td>{{$s->nome}}</td>
        <td>{{$s->descricao}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@stop

