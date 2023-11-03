@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
@stop

@section('content')
    <table id="produtos" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>CODBARRAS</th>
                <th>DESCRIÇÃO</th>
                <th>UN</th>
                <th>PREÇO CUSTO</th>
                <th>PREÇO VENDA</th>
                <th>ESTOQUE</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Row 1 Data 1</td>
                <td>Row 1 Data 2</td>
            </tr>
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop