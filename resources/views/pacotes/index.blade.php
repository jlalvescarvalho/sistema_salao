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

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush