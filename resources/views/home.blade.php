@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">

    <div class="btn-group">
        <button id="create"class="btn btn-outline-success btn-lg" type="button">Criar Order</button>
        <button id="create"class="btn btn-outline-primary btn-lg" type="button">Pesquisar Order</button>
    </div>
    <div class="btn-group">
        <button id="editar"class="btn btn-outline-secondary btn-lg" type="button">Editar Order</button>
        <button id="deletar"class="btn btn-outline-danger btn-lg" type="button">Apagar Order</button>
    </div>
</div>

<style>
    html, body {
        background-color: var(--background-default);
    }
    .container {
        margin-left: 310px;
        margin-top: -500px;
        /* width: 100%; */
        /* display: inline; */
        /* margin-top: -200; */
    }
    /* .btn-order {
        margin-left: 50px;
        margin-top: -960px;
    } */
    .btn {
        font-size: 30px;
        float: right;
        width: 300px;
        height: 117px;
        margin-bottom: 30px;
        margin-right: 30px;
    }
</style>
@endsection
