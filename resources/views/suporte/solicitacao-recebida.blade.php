@extends('layout.master')

@section('sample.feature', 'Form e Input')
@section('sample.title', 'Suporte')

@section('menu')@include('suporte.menu')@stop

@section('content')

<h3>
    Solicitação recebida 
</h3>

<p>
    Obrigado por entrar em contato. Os dados enviados para o suporte são:
</p>

<div style="padding:1em; background-color: #eee;">
    @foreach ($input as $item => $valor)
        {{-- Nos nao queremos o campo _token, padrao nos formularios --}}
        @if ($item != '_token')
            <p>
                <strong>{{ ucwords($item) }}</strong>: {{ $valor }}
            </p>
        @endif
    @endforeach
</div>
@stop

