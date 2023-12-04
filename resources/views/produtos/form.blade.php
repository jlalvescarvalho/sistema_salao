@extends('adminlte::page')

@section('title', $pageTitle)

@section('content_header')
    <h1 class="page-title">{{ $pageTitle }}</h1>
@stop

@section('content')
    @if ($produto->exists)
        <form method="POST" action="{{ route('produtos.update', $produto) }}" class="custom-form">
        @method('PUT')
    @else
        <form method="POST" action="{{ route('produtos.store') }}" class="custom-form">
    @endif

    @csrf
    <section>
        <div class="form-group">
            <label for="codbarra">Código de Barras</label>
            <input id="codbarra" type="text" name="codbarra"
                class="form-control @error('codbarra') is-invalid @enderror"
                value="{{ old('codbarra', $produto->codbarra) }}" placeholder="Código de Barras" required>
            @error('codbarra')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input id="descricao" type="text" name="descricao"
                class="form-control @error('descricao') is-invalid @enderror"
                value="{{ old('descricao', $produto->descricao) }}" placeholder="Descrição" required>
            @error('descricao')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="un">Unidade de Medida</label>
            <input id="un" type="text" name="un" class="form-control @error('un') is-invalid @enderror"
                value="{{ old('un', $produto->un) }}" placeholder="Ex.: 20ml" required>
            @error('un')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="preco_custo">Custo</label>
            <input id="preco_custo" type="number" name="preco_custo"
                class="form-control @error('preco_custo') is-invalid @enderror"
                value="{{ old('preco_custo', $produto->preco_custo) }}" placeholder="Preço de Custo" required>
            @error('preco_custo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="preco_venda">Preço de Venda</label>
            <input id="preco_venda" type="number" name="preco_venda"
                class="form-control @error('preco_venda') is-invalid @enderror"
                value="{{ old('preco_venda', $produto->preco_venda) }}" placeholder="Preço de Venda" required>
            @error('preco_venda')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="estoqueinicial">Estoque Inicial</label>
            <input id="estoqueinicial" type="number" name="estoqueinicial"
                class="form-control @error('estoqueinicial') is-invalid @enderror"
                value="{{ old('estoqueinicial', $produto->estoqueinicial) }}" placeholder="Estoque Inicial" required>
            @error('estoqueinicial')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </section>

    <x-form-buttons :entity="$produto" />
    </form>
@stop

@section('css')
@stop

@section('js')
@stop
