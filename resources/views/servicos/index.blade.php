@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
<div style="padding-bottom: 1px;"></div>
@stop

@section('content')

<a href="{{ route('servicos.create') }}"><button class="btn btn-primary">+ Novo</button></a>
<br><br> 
    {{ $dataTable->table() }}
@stop

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
