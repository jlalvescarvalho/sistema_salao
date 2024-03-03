@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1 class="page-title">{{ $pageTitle }}</h1>
@stop

@section('content')
    @if ($contrato->exists)
        <form method="POST" action="{{ route('contratos.update', $contrato) }}" class="custom-form">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('contratos.store') }}" class="custom-form">
    @endif

    @csrf
    <section>
        <div class="row">
            <div class="form-group col-12 col-lg-5">
                <label for="id_cliente">Cliente</label>
                <select id="id_cliente" name="id_cliente" class="form-control @error('id_cliente') is-invalid @enderror" {{ $contrato->exists ? 'disabled' : '' }}>
                    <option value="" disabled hidden @if (empty(old('id_cliente', $contrato->id_cliente))) selected @endif>Escolha o cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" @if (old('id_cliente', $contrato->id_cliente) === $cliente->id) selected @endif >{{ $cliente->nome }}</option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-5">
                <label for="id_pacote">Pacote</label>
                <select id="id_pacote" name="id_pacote" class="form-control @error('id_pacote') is-invalid @enderror" {{ $contrato->exists ? 'disabled' : '' }}>
                    <option value="" disabled hidden @if (empty(old('id_pacote', $contrato->id_pacote))) selected @endif>Escolha o pacote</option>
                    @foreach ($pacotes as $pacote)
                        <option value="{{ $pacote->id }}" @if (old('id_pacote', $contrato->id_pacote) === $pacote->id) selected @endif >{{ $pacote->nome }}</option>
                    @endforeach
                </select>
                @error('id_pacote')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </section>
    <x-form-buttons :entity="$contrato" />
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
