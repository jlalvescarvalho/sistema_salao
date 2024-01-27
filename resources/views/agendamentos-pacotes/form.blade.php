@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1 class="page-title">{{ $pageTitle }}</h1>
@stop

@section('content')
    @if ($agendamento->exists)
        <form method="POST" action="{{ route('pacotes.agendamentos.update', $agendamento) }}" class="custom-form">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('pacotes.agendamentos.store') }}" class="custom-form">
    @endif

    @csrf
    <section>
        <div class="row">
            <div class="form-group col-12 col-lg-10">
                <label for="id_contrato_pacote">Contrato</label>
                <select id="id_contrato_pacote" name="id_contrato_pacote" class="form-control @error('id_contrato_pacote') is-invalid @enderror" {{ $agendamento->exists ? 'disabled' : '' }}>
                    <option value="" disabled hidden @if (empty(old('id_contrato_pacote', $agendamento->id_contrato_pacote))) selected @endif>Escolha o contrato do cliente</option>
                    @foreach ($contratos as $contrato)
                        <option value="{{ $contrato['id'] }}" @if (old('id_contrato_pacote', $agendamento->id_contrato_pacote) === $contrato['id']) selected @endif >{{ $contrato['label'] }}</option>
                    @endforeach
                </select>
                @error('id_contrato_pacote')
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
            <div class="form-group col-12 col-lg-4">
                <label for="data_hora">Data</label>
                <input id="data_hora" type="datetime-local" name="data_hora"
                    class="form-control @error('data_hora') is-invalid @enderror"
                    value="{{ old('data_hora', $agendamento->data_hora) }}" 
                    min="{{ date('Y-m-d\Th:i') }}"
                    >
                @error('data_hora')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-4">
                <label for="data_minima_cancelamento">Data mínima de cancelamento (opcional)</label>
                <input id="data_minima_cancelamento" type="datetime-local" name="data_minima_cancelamento"
                    class="form-control @error('data_minima_cancelamento') is-invalid @enderror"
                    value="{{ old('data_minima_cancelamento', $agendamento->data_minima_cancelamento) }}" 
                    min="{{ date('Y-m-d\Th:i') }}"
                    >
                @error('data_minima_cancelamento')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-4">
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
