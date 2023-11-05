@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
    <h1>Servicos</h1>
@stop

@section('content')
<a href="{{ route('servicos.create') }}"><button class="btn btn-primary">+ Novo</button></a>
<br><br> 
    {{ $dataTable->table() }}
@stop

@section('css')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.7/datatables.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.7/datatables.min.js"></script>
@stop

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
