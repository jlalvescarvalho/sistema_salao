@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1 class="page-title">{{ $pageTitle }}</h1>
@stop

@section('content')
    @if ($agendamento->exists)
        <form method="POST" action="{{ route('agendamentos.update', $agendamento) }}" class="custom-form">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('agendamentos.store') }}" class="custom-form">
    @endif

    @csrf
    <section>
        <div class="row">
            <div class="form-group col-12 col-lg-5">
                <label for="id_cliente">Cliente</label>
                <select id="id_cliente" name="id_cliente" class="form-control @error('id_cliente') is-invalid @enderror" {{ $agendamento->exists ? 'disabled' : '' }}>
                    <option value="" disabled hidden @if (empty(old('id_cliente', $agendamento->id_cliente))) selected @endif>Escolha o cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}" @if (old('id_cliente', $agendamento->id_cliente) === $cliente->id) selected @endif >{{ $cliente->nome }}</option>
                    @endforeach
                </select>
                @error('id_cliente')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-5">
                <label for="id_servico">Serviço</label>
                <select id="id_servico" name="id_servico" class="form-control @error('id_servico') is-invalid @enderror" {{ $agendamento->exists ? 'disabled' : '' }}>
                    <option value="" disabled hidden @if (empty(old('id_servico', $agendamento->id_servico))) selected @endif>Escolha o serviço</option>
                    @foreach ($servicos as $servico)
                        <option value="{{ $servico->id }}" @if (old('id_servico', $agendamento->id_servico) === $servico->id) selected @endif >{{ $servico->nome }}</option>
                    @endforeach
                </select>
                @error('id_servico')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-2">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" {{ count($statusList) == 1  ? 'disabled' : '' }}>
                    <option value="{{ $statusList[0] }}" disabled hidden @if (empty(old('status', $agendamento->status))) selected @endif>{{ ucfirst($statusList[0]) }}</option>
                    @foreach ($statusList as $status)
                        <option value="{{ $status }}" @if (old('status', $agendamento->status) === $status) selected @endif >{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12 col-lg-6">
                <label for="data_hora">Data</label>
                <input id="data_hora" type="datetime-local" name="data_hora"
                    class="form-control @error('data_hora') is-invalid @enderror"
                    value="{{ old('data_hora', $agendamento->data_hora) }}"
                    >
                @error('data_hora')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="duracao">Duração estimada (opcional)</label>
                <input id="duracao" type="time" name="duracao"
                    class="form-control @error('duracao') is-invalid @enderror"
                    value="{{ old('duracao', $agendamento->duracao) }}" place>
                @error('duracao')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-12">
                <label for="observacao">Observação (opcional)</label>
                <textarea id="observacao" name="observacao" class="form-control @error('observacao') is-invalid @enderror" rows="3" placeholder="Ex.: levar o produto que o cliente pediu">{{ old('observacao', $agendamento->observacao) }}</textarea>
                @error('observacao')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </section>
    <x-form-buttons :entity="$agendamento" />
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
