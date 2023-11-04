@extends('adminlte::page')

@section('title', 'Cadastro de Serviços')

@section('content_header')
    <h1 class="page-title">Cadastro de Serviços</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('servicos.store') }}" class="custom-form">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                value="{{ old('nome') }}" placeholder="Informe o nome do serviço">
            @error('nome')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                value="{{ old('descricao') }}" rows="3" placeholder="Descreva o serviço"></textarea>
            @error('descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="form-group col-12 col-lg-6">
                <label for="preco_custo">Custo (opcional)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input id="preco_custo" name="preco_custo"
                        class="form-control @error('preco_custo') is-invalid @enderror" value="{{ old('preco_custo') }}"
                        type="number" class="form-control" min="0" max="999999" placeholder="0.00">
                </div>
                @error('preco_custo')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="preco_venda">Preço de venda</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <input id="preco_venda" name="preco_venda"
                        class="form-control @error('preco_venda') is-invalid @enderror" value="{{ old('preco_venda') }}"
                        type="number" class="form-control" min="0" max="999999" placeholder="0.00">
                </div>
                @error('preco_venda')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        #descricao {
            resize: none;
        }
    </style>
@stop

@section('js')
@stop
