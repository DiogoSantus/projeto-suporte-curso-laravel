@extends('layout.master')

@section('sample.feature', 'Twitter Bootstrap')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

<h3>
    Solicitação recebida 
</h3>

<p class="alert alert-info">
    Obrigado por entrar em contato. Os dados enviados para o suporte são:
</p>

<div class="panel">
    <div class="panel-body">
    @foreach ($input as $item => $valor)
        {{-- Nos nao queremos o campo _token, padrao nos formularios --}}
        @if ($item != '_token')
            <p>
                <strong>{{ ucwords($item) }}</strong>: {{ $valor }}
            </p>
        @endif
    @endforeach
    </div>
</div>
@stop

