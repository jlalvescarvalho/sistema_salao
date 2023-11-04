@extends('adminlte::page')

@section('title', 'Cadastro de Clientes')

@section('content_header')
    <h1 class="page-title">Cadastro de Clientes</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('clientes.store') }}" class="custom-form">
        @csrf

        <section>
            <h4>Dados Pessoais</h4>
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                        value="{{ old('nome') }}" placeholder="Informe o nome completo" required>
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="cpf">CPF</label>
                    <input id="cpf" type="text" name="cpf"
                        class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}"
                        placeholder="000.000.000-00" required>
                    @error('cpf')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="data_nascimento">Data de nascimento (opcional)</label>
                    <input id="data_nascimento" type="date" name="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror"
                        value="{{ old('data_nascimento') }}">
                    @error('data_nascimento')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" type="text" name="telefone"
                        class="form-control @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}"
                        placeholder="(00) 00000-0000" required>
                    @error('telefone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </section>
        <section>
            <h4>Endereço (opcional)</h4>
            <div class="row">
            <div class="form-group col-12 col-lg-4">
                <label for="endereco.cep">CEP</label>
                <input id="endereco.cep" type="text" name="endereco[cep]"
                    class="form-control @error('endereco.cep') is-invalid @enderror"
                    value="{{ old('endereco.cep') }}" placeholder="00000-000">
                @error('endereco.cep')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
                <div class="form-group col-12 col-lg-6">
                    <label for="endereco.rua">Rua</label>
                    <input id="endereco.rua" type="text" name="endereco[rua]"
                        class="form-control @error('endereco.rua') is-invalid @enderror"
                        value="{{ old('endereco.rua') }}" placeholder="Nome da rua">
                    @error('endereco.rua')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-12 col-lg-2">
                    <label for="endereco.numero">Número</label>
                    <input id="endereco.numero" type="text" name="endereco[numero]"
                        class="form-control @error('endereco.numero') is-invalid @enderror"
                        value="{{ old('endereco.numero') }}" placeholder="Número">
                    @error('endereco.numero')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-lg-6">
                    <label for="endereco.bairro">Bairro</label>
                    <input id="endereco.bairro" type="text" name="endereco[bairro]"
                        class="form-control @error('endereco.bairro') is-invalid @enderror"
                        value="{{ old('endereco.bairro') }}" placeholder="Bairro">
                    @error('endereco.bairro')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-12 col-lg-5">
                    <label for="endereco.cidade">Cidade</label>
                    <input id="endereco.cidade" type="text" name="endereco[cidade]"
                        class="form-control @error('endereco.cidade') is-invalid @enderror"
                        value="{{ old('endereco.cidade') }}" placeholder="Cidade">
                    @error('endereco.cidade')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-12 col-lg-1">
                    <label for="endereco.estado">Estado</label>
                    <input id="endereco.estado" type="text" name="endereco[estado]"
                        class="form-control @error('endereco.estado') is-invalid @enderror"
                        value="{{ old('endereco.estado') }}" placeholder="UF" minlength="2" maxlength="2">
                    @error('endereco.estado')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </section>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
