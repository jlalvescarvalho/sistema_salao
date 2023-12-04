@extends('adminlte::page')

@section('title', 'Pacotes')

@section('content_header')
    <h1>Pacotes</h1>
@stop

@section('content')
    <x-btn-create-resource route="pacotes.create" />
    {{ $dataTable->table() }}
@stop

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush