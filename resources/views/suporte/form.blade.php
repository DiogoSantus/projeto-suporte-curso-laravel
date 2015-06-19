@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

@include('layout.mensagens')

{!! Form::open(array('url' => 'suporte')) !!}
<fieldset>
    <legend>Solicitação de suporte</legend>
    
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['placeholder'=>'digite seu nome']) !!}

    <br/>

    {!! Form::label('email', 'E-mail') !!}
    {!! Form::text('email', null, ['placeholder'=>'digite seu email no formato xxx@xxx.xxx']) !!}

    <br/>

    {!! Form::label('data', 'Data') !!}
    {!! Form::text('data', null, ['placeholder'=>'data da ocorrência']) !!}

    <br/>

    {!! Form::label('produto_id', 'Produto') !!}
    {{-- Usamos o modelo de produtos --}}
    {!! Form::select('produto_id', $produtos->lists('nome','id')) !!}

    <br/>

    {!! Form::label('descricao', 'Problema') !!}
    {!! Form::textarea('descricao', null, ['placeholder'=>'descreva o problema']) !!}

    <br />

    {!! Form::submit('Enviar') !!}

</fieldset>
{!! Form::close() !!}

@stop

