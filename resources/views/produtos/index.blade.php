@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')

<a href="{{ route('produtos.create') }}"><button class="btn btn-primary">+ Novo</button></a>
<br><br> 
    {{ $dataTable->table() }}
@stop


@section('plugins.Datatables', true)
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush