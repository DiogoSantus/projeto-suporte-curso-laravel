@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

@include('layout.mensagens')

@if ($acao == 'edit')
{!! Form::model($produto, array('url' => 'produto/'.$produto->id, 'method' => 'put', 'class'=>'form-horizontal')) !!}
@else
{!! Form::open(array('url' => 'produto', 'class'=>'form-horizontal')) !!}
@endif
<fieldset>
    <legend>Produto</legend>

    <div class="form-group">
        {!! Form::label('nome', 'Nome', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('nome', null, ['placeholder'=>'digite o nome do produto', 'class'=>'form-control']) !!}
        </div>
    </div>

    <br/>
    
    <div class="form-group">
        {!! Form::submit('Enviar', ['class'=>'col-sm-2 col-sm-offset-2 btn btn-default']) !!}
    </div>
        
</fieldset>
{!! Form::close() !!}

@stop

