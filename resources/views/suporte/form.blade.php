@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')
    @include('suporte.menu')
@stop

@section('content')

{!! Form::open(array('url' => 'suporte')) !!}
    
    {!! Form::label('cliente', 'Nome') !!}
    {!! Form::text('cliente', null, ['placeholder'=>'digite seu nome']) !!}

    <br/>

    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email', null, ['placeholder'=>'digite seu email no formato xxx@xxx.xxx']) !!}

    <br/>

    {!! Form::label('data', 'Data') !!}
    {!! Form::text('data', null, ['placeholder'=>'data da ocorrência']) !!}

    <br/>

    {!! Form::label('produto', 'Produto') !!}
    {{-- O array de produtos eh forcado para iniciar no indice 1 --}}
    {!! Form::select('produto', [1=>'Monitor', 'CPU', 'Impressora', 'Scanner', 'Mouse', 'Teclado']) !!}

    <br/>

    {!! Form::label('descricao', 'Problema') !!}
    {!! Form::textarea('descricao', null, ['placeholder'=>'descreva o problema']) !!}

    <br />

    {!! Form::submit('Enviar') !!}

{!! Form::close() !!}

@stop

