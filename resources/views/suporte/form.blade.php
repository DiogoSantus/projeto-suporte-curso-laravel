@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

@include('layout.mensagens')

<div class='container'>
    {!! Form::open(array('url' => 'suporte', 'class'=>'form-horizontal')) !!}
    <fieldset>
        <legend>Solicitação de suporte</legend>

        <div class="form-group">
            {!! Form::label('nome', 'Nome', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('nome', null, ['placeholder'=>'digite seu nome', 'class'=>'form-control']) !!}
            </div>
        </div>

        <br/>

        <div class="form-group">
            {!! Form::label('email', 'E-mail', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('email', null, ['placeholder'=>'digite seu email no formato xxx@xxx.xxx', 'class'=>'form-control']) !!}
            </div>
        </div>

        <br/>

        <div class="form-group">
            {!! Form::label('data', 'Data', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('data', null, ['placeholder'=>'data da ocorrência', 'class'=>'form-control']) !!}
            </div>
        </div>

        <br/>

        <div class="form-group">
            {!! Form::label('produto_id', 'Produto', ['class'=>'col-sm-2 control-label']) !!}
            {{-- Usamos o modelo de produtos --}}
            <div class="col-sm-10">
                {!! Form::select('produto_id', $produtos->lists('nome','id'), null, ['class'=>'form-control']) !!}
            </div>
        </div>

        <br/>

        <div class="form-group">
            {!! Form::label('descricao', 'Problema', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('descricao', null, ['placeholder'=>'descreva o problema', 'class'=>'form-control']) !!}
            </div>
        </div>

        <br />

        <div class="form-group">
            {!! Form::submit('Enviar', ['class'=>'col-sm-2 col-sm-offset-2 btn btn-default']) !!}
        </div>
    </fieldset>
    {!! Form::close() !!}
</div>

@stop

