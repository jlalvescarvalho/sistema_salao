@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <x-btn-create-resource route="produtos.create" />
    {{ $dataTable->table() }}
@stop


@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush