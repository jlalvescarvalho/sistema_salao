@extends('adminlte::page')

@section('title', 'Agendamentos')

@section('content_header')
    <h1>Agendamentos</h1>
@stop

@section('content')
    <x-btn-create-resource route="agendamentos.create" />
    {{ $dataTable->table() }}
@stop

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush