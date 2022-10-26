@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">
<!-- <table class="table table-striped table-bordered dt-responsive nowrap"> -->
    <form id="order" method="POST" name="order" action="{{ route('saveOrder') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div id="order-client">                
                <label class="text-left" for="client-selected"> Cliente :</label> 
                <h6 id="os"class="alert alert-secondary" role="alert">{{ $order['id'] }}</h6>         
                <h1 class="text-center">{{ $client['name'] }}</h1>                 
        </div> 
        <br>
        <div id="order-created">  
            <h5 class="text-left">Descrição do Aparelho :</h5>   
            <h4 class="text-center">{{ $order['brand'] }} - {{ $order['model'] }}</h4> 
            <h6 class="text-left">Número de Série:{{ $order['serial_number'] }} &nbsp; Status: 
                <?php echo $order['device_status'] ?  'ligando' : 'não liga'; ?> &nbsp; </h6> 
            <h6 class="text-left">Acessórios:
                <?php $i = ['[',']','"'];echo $order['accessories'] ?  str_replace($i,'',$order['accessories']) : ''; ?></h6>  
            <h6 class="text-left">Observação :
                <?php echo $order['repaired'] ?  'Já passou por assitência' : 'nunca passou por assitência'; ?> </h6>                 
        </div> 
        <br>
        <div id="order-service">  
            <h5 class="text-left">Descrição do Serviços :</h5> 
            <!-- Select Servicess -->             
            <div>
                <label >Selecione o Serviços :</label>
            </div>
            <div class="form-group">
                <select id="service"class="custom-select" name="requested_service" required>
                    <option selected>Choose...</option>
                    <option value="Trocar tela">Trocar tela</option>
                    <option value="Trocar bateria">Trocar bateria</option>
                    <option value="Reparo na placa">Reparo na placa</option>
                    <option value="Outros">Outros</option>                        
                </select> 
                
                <button type="button" id="addService"class="btn btn-primary" data-mdb-toggle="modal" 
                    data-mdb-target="#exampleModal">Add Serviço
                </button>
                <button type="button" id="selectServiçe"class="btn btn-primary" data-mdb-toggle="modal" 
                    data-mdb-target="#exampleModal">Selecionar
                </button>   
                <!-- <button id="selectServiçe" class="btn btn-primary"></button>                   -->
            </div>
            <div class="row mb-4">        
                <div class="col">
                    <div class="form-outline mb-2">
                        <input type="text" id="serv" name="serv" class="selected"/> 
                        <!-- <input type="text" id="val" name="val" class="value"/>  -->
                    </div>
                </div>
            </div>
        

            <!-- Select Peças -->
        
            <div>
                <label >Selecione as peças :</label>
            </div>
                <div class="form-group">
                    <select id="service"class="custom-select" name="requested_service" required>
                        <option selected>Choose...</option>
                        <option value="Trocar tela">Frontal Iphone7</option>
                        <option value="Trocar bateria">Frontal SamsungA30</option>
                        <option value="Reparo na placa">Bateria Iphone7</option>
                        <option value="Outros">Outros</option>                        
                    </select> 
                    
                    <button type="button" id="addParts"class="btn btn-primary" data-mdb-toggle="modal" 
                        data-mdb-target="#exampleModal">Add Peças
                    </button>
                    <button type="button" id="selectServiçe"class="btn btn-primary" data-mdb-toggle="modal" 
                        data-mdb-target="#exampleModal">Selecionar
                    </button>   
                    <!-- <button id="selectServiçe" class="btn btn-primary"></button>                   -->
                </div>
                <div class="row mb-4">        
                    <div class="col">
                        <div class="form-outline mb-2">
                            <input type="text" id="serv" name="serv" class="selected"/> 
                            <!-- <input type="text" id="val" name="val" class="value"/>  -->
                        </div>
                    </div>
                </div>
            </div>            
        </div>    
        <!-- Button trigger modal -->
        

        <!-- Modal add Services -->
        <div class="modal fade" id="addService1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Peças</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <label class="form-label" for="form3Example2">Serviço :</label>
                        <input type="text" id="ask" name="ask" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Valor :</label>
                        <input type="text" id="sale-value" name="sale-value" class="form-control"/> 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn-close" data-mdb-dismiss="modal">
                        Close
                    </button>
                        <button type="button" class="btn-save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal add Services -->
        <div class="modal fade" id="addParts1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Peças</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <label class="form-label" for="form3Example2">Peça :</label>
                        <input type="text" id="ask" name="ask" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Marca :</label>
                        <input type="text" id="brand" name="brand" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Modelo :</label>
                        <input type="text" id="model" name="model" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Valor de Compra :</label>
                        <input type="text" id="purchase value" name="purchase-value" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Valor de Venda :</label>
                        <input type="text" id="sale-value" name="sale-value" class="form-control"/> 
                        <label class="form-label" for="form3Example2">Quqntidade :</label>
                        <input type="text" id="inventory" name="inventory" class="form-control"/> 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn-close" data-mdb-dismiss="modal">
                        Close
                    </button>
                        <button type="button" class="btn-save">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Submit button -->
        <div class="submit">
            <button id="btn-save" type="submit" class="btn btn-success btn-block mb-4">Salvar</button'> 
        </div>          
                      
    </form>
</div>    
<!-- MDB -->
<script>
    document.getElementById('addService').onclick = function() {
        alert('Modal');
        $('#addService1').modal('show')
    }
    document.getElementById('addParts').onclick = function() {
        alert('Modal');
        $('#addParts1').modal('show')
    }
    document.getElementById('selectServiçe').onclick = function() {
        alert('Serviçe');
        service = document.getElementById('service').value;
        document.getElementById('serv').value = service;
        alert(serviçe);add
    }
    
    
</script>
<style>
    html, body {
        background-color: var(--background-default);
    }
    .btn {
        min-height: 50px;
        max-height: 50px;
        min-width: 150px;
        max-width: 150px; 
        /* float: right;  */
    }
    #btn-save {
        margin-left: 950px;
        margin-top: -70px;
    }
    .container {
        margin-left: 310px;
        min-width: 700px;
        max-width: 700px;       
        position:absolute; 
        top:55%;
        left:25%;
        transform: translate(-50%, -50%);
    }
    .custom-select {
        min-width: 380px;
        max-width: 380px;
        margin-left: 10px;
    }
    .selected {
        min-width: 380px;
        max-width: 380px;
        margin-left: 10px;
        background:none;
        border:none;
    }
    .value {
        min-width: 130px;
        max-width: 130px;
        /* display: block;
        margin-right: 10px; */
    }
    #order-client {
        margin-top: -180px;
        border-radius: 10px;
        border: 1px solid;
        min-height: 90px;
        max-height: 90px;
        color: #001f36;
        opacity: 0.5;
    }
    #order-created {
        border-radius: 10px;
        border: 1px solid;
        min-height: 190px;
        max-height: 190px;
        color: #001f36;
        opacity: 0.5;
    }
    #order-service {
        border-radius: 10px;
        border: 1px solid;
        min-height: 400px;
        max-height: 400px;
        color: #001f36;
        opacity: 0.5;
    }
    .text-left {
        margin-left: 10px;
        margin-top: 5px;
    }
    .text-right {
        margin-right: 10px;
        margin-top: 5px;
    }
    #id {        
        float: right;
        margin-right: 20px;
    }
    #os {
        /* font-size: 20px; */
        font-family: 'Gill Sans',;
        float: right;
        margin-top: 5px;
        margin-right: 15px;
        border-radius: 10px;
        border: 1px solid;
        text-align: center;
        min-width: 100px;
        max-width: 100px;
        min-height: 40px;
        max-height: 40px;
    }
    h1 {
        font-size: 20px;
        margin-left: 90px;
    }
    label {
        margin-left: 10px;
    }
    #description {
        min-height: 120px;
        max-height: 120px;
    }
    #estado {
        min-width: 100px;
        max-width: 100px;
        min-height: 40px;
        max-height: 40px;
    }
    #addService {
        margin-left: 10px;
        margin-right: 10px;
        float: right;
        min-width: 120px;
        max-width: 120px;
        min-height: 40px;
        max-height: 40px;
    }
    #addParts {
        margin-left: 10px;
        margin-right: 10px;
        float: right;
        min-width: 120px;
        max-width: 120px;
        min-height: 40px;
        max-height: 40px;
    }
    #selectServiçe { 
        float: right; 
        background-color: green;
        border-color: greenyellow;
        /* margin-left: 10px;       */
        /* margin-right: 10px; */
        min-width: 120px;
        max-width: 120px;
        min-height: 40px;
        max-height: 40px;
    }
    
</style> 






















<style>
    html, body {
        background-color: var(--background-default);
    }
</style>    
@endsection