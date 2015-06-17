@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

@if ($acao == 'edit')
{!! Form::model($produto, array('url' => 'produto/'.$produto->id, 'method' => 'put')) !!}
@else
{!! Form::open(array('url' => 'produto')) !!}
@endif
<fieldset>
    <legend>Produto</legend>
    
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['placeholder'=>'digite o nome do produto']) !!}

    <br/>

    {!! Form::submit('Enviar') !!}

</fieldset>
{!! Form::close() !!}

@stop

