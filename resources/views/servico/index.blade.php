@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Servicos</h1>
@stop

@section('content')
@foreach ($servicos as $servico)
<p>{{ $servico->nome }}</p>
@endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
