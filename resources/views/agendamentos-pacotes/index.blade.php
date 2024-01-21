@extends('adminlte::page')

@section('title', 'Agendamento de Pacotes')

@section('content_header')
    <h1>Agendamento de Pacotes</h1>
@stop

@section('content')
    <x-btn-create-resource route="pacotes.agendamentos.create" />
    {{ $dataTable->table() }}
@stop

@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush