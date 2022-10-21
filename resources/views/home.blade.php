@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">

    <div class="btn-group ">
        <a class="nav-link" href="{{ route('registration', [$role_id = 1.1]) }}">
            <button id="create"class="btn btn-outline-success btn-lg" type="button">Criar Order</button>
        </a>
        <a class="nav-link" href="{{ route('editOrder') }}">    
            <button id="create"class="btn btn-outline-primary btn-lg" type="button">Pesquisar Order</button>
        </a>
    </div>
    <div class="btn-group">
        <a class="nav-link" href="{{ route('editOrder') }}">
            <button id="editar"class="btn btn-outline-secondary btn-lg" type="button">Editar Order</button>
        </a>
        <a class="nav-link" href="{{ route('editOrder') }}">
            <button id="deletar"class="btn btn-outline-danger btn-lg" type="button">Finalizar Order</button>
        </a>
    </div>
</div>

<style>
    html, body {
        background-color: var(--background-default);
    }
    .container {
        margin-left: 310px;
        /* margin-top: -600px; */        
        position:absolute; 
        top:30%;
        left:40%;
        transform: translate(-50%, -50%);
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
        margin-right: 40px;
        border-radius: 15px;
    }
</style>
@endsection
