@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1 class="page-title">{{ $pageTitle }}</h1>
@stop

@section('content')
    @if ($pacote->exists)
        <form method="POST" action="{{ route('pacotes.update', $pacote) }}" class="custom-form">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('pacotes.store') }}" class="custom-form">
    @endif

        @csrf
        <div class="form-group">
            <label for="id_servico">Serviço</label>
            <select id="id_servico" name="id_servico" class="form-control @error('id_servico') is-invalid @enderror">
                <option value="" disabled hidden @if (empty(old('id_servico', $pacote->id_servico))) selected @endif>Escolha o serviço</option>
                @foreach ($servicos as $servico)
                    <option value="{{ $servico->id }}" @if (old('id_servico', $pacote->id_servico) === $servico->id) selected @endif >{{ $servico->nome }}</option>
                @endforeach
            </select>
            @error('id_servico')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome', $pacote->nome) }}" placeholder="Informe o nome do pacote"required>
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricao">Descrição (opcional)</label>
            <textarea id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror" rows="3" placeholder="Descreva como este pacote funciona">{{ old('descricao', $pacote->descricao) }}</textarea>
            @error('descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-12 col-lg-2">
                <label for="valor">Valor</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input id="valor" name="valor" class="form-control @error('valor') is-invalid @enderror"
                        value="{{ old('valor', $pacote->valor) }}" type="number" class="form-control" min="0" max="999999"
                        placeholder="0.00" required>
                </div>
                @error('valor')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-12 col-lg-5">
                <label for="qtd_sessoes">Quantidade de Sessões</label>
                <input id="qtd_sessoes" type="number" name="qtd_sessoes"
                    class="form-control @error('qtd_sessoes') is-invalid @enderror" value="{{ old('qtd_sessoes', $pacote->qtd_sessoes) }}"
                    placeholder="Total de sessões do serviço" min="1" max="255" required>
                @error('qtd_sessoes')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-12 col-lg-5">
                <label for="validade">Validade (dias)</label>
                <input id="validade" type="number" name="validade"
                    class="form-control @error('validade') is-invalid @enderror" value="{{ old('validade', $pacote->validade) }}"
                    placeholder="Quantidade de dias para usar as sessões" min="1" max="255" required>
                @error('validade')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <x-form-buttons :entity="$pacote" />
    </form>
@stop

@section('css')
    <style>
        #descricao {
            resize: none;
        }
    </style>
@stop

@section('js')
@stop
