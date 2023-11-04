@extends('adminlte::page')

@section('title', 'Serviços')

@section('content_header')
<div style="padding-bottom: 1px;"></div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Serviços</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')



@stop
