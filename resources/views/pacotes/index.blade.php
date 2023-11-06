@extends('adminlte::page')

@section('title', 'Pacotes')

@section('content_header')
    <h1>Pacotes</h1>
@stop

@section('content')

<a href="{{ route('pacotes.create') }}"><button class="btn btn-primary">+ Novo</button></a>
<br><br> 
    {{ $dataTable->table() }}
@stop


@section('css')
    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.7/datatables.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.7/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
@stop

@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush