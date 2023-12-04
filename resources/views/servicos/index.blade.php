@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
<div style="padding-bottom: 1px;"></div>
@stop

@section('content')
    <x-btn-create-resource route="servicos.create" />
    {{ $dataTable->table() }}
@stop

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
