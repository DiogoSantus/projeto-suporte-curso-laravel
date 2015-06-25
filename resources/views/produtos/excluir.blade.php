@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

<h3>
    Excluir produto
</h3>

<h4 class="alert alert-danger">
    Excluir produto {{$produto->nome}} ??
</h4>

{!! Form::open(array('url' => 'produto/'.$produto->id, 'method' => 'delete')) !!}
    {!! Form::submit('Confirmar', ['class'=>'btn btn-danger']) !!} 
    <a href="{{ url('produto') }}" class="btn btn-success">Cancelar</a>
{!! Form::close() !!}

@stop

