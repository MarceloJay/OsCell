@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">
    <!-- <table class="table table-striped table-bordered dt-responsive nowrap"> -->
    <form id="order" method="POST" name="order" action="{{ route('saveOrder') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div id="client-selected">                
                <label id="client-text" class="client-selected" for="client-selected"> Cliente :</label>
                <input type="hidden" name="client_id" value="{{ $client['id'] }}"/>                         
                <h1 class="text-center">{{ $client['name'] }}</h1>                 
            </div> 
            <br>
            <div>            
                <h3 class="text-center">Descrição do Aparelho</h3>
            </div>        
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">        
                <div class="col">
                <div class="form-outline mb-2">
                    <label id="text-brand" class="form-label" for="form3Example1">Marca :</label>
                    <input type="text" id="brand" name="brand" class="form-control" />            
                </div>
                </div>
                <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example2"> Modelo :</label>
                    <input type="text" id="model" name="model" class="form-control" />            
                </div>
                </div>
                <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example2"> Número de Série :</label>
                    <input type="text" id="serial_number" name="serial_number" class="form-control" />            
                </div>
                </div>
            </div>
            <!-- Email and phone input -->
                <div class="mb-3">
                    <label for="validationTextarea">Defeito Relatado pelo Cliente</label>
                    <textarea class="form-control" id="defect_description"name="defect_description"></textarea>
                </div>
                    <label for="validationTextarea">Status do Aparelho :</label>
                <div class="custom-control custom-checkbox mb-6">
                    <!-- <form> -->
                        <input type="radio" name="device_status" id="on" value="1" checked>Aparelho liga</input>&nbsp;
                        <input type="radio" name="device_status" id="off"value="0">Aparelho não liga</input>
                    <!-- </form> -->
                </div>
                <label>Acessórios :</label><br/>
                <div class="custom-control custom-radio mb-2">
                    <input type="checkbox" name="accessories[]" value="cape"> Capinha &nbsp;
                    <input type="checkbox" name="accessories[]" value="chip"> Chip &nbsp;
                    <input type="checkbox" name="accessories[]" value="charger"> Carregador &nbsp;
                    <input type="checkbox" name="accessories[]" value="cable"> Cabo 
                </div>
                <div class="custom-control custom-radio mb-2">
                    <!-- <input type="checkbox" id="repaired" name="repaired" value="true"> -->
                    <input type="hidden" name="repaired" value="0">
                    <input type="checkbox" name="repaired" value="1">
                    <!-- <input type="radio" name="repaired" id="repaired" value="true" >Aparelho liga</input> -->
                    <label for="customControlValidation3">Já passou por outra assitência</label>
                </div>

                <div class="form-group">
                    <label for="validationTextarea">Tempo de uso do Aparelho :</label>
                    <select class="custom-select" name="used" required>
                        <option value="1">Um ano</option>
                        <option value="2">Dois anos</option>
                        <option value="3">Três anos ou mais..</option>
                    </select>
                    <div class="invalid-feedback">Exemplo de feedback invalido para o select</div>
                </div>

                <div>
                    <label >Serviço Solicitado pelo Cliente :</label>
                </div>

                <div class="form-group">
                    <select class="custom-select" name="requested_service"required>
                        <option value="1">Trocar tela</option>
                        <option value="2">Trocar bateria</option>
                        <option value="3">Reparo na placa</option>
                        <option value="4">Outros</option>
                    </select>                    
                </div>           
            
            <!-- Submit button -->
            <button id="btn-save" type="submit" class="btn btn-success btn-block mb-4">Salvar</button'>           
        </form>
    <!-- <table class="table table-striped table-bordered dt-responsive nowrap"> -->
</div>

<style>
    html, body {
        background-color: var(--background-default);
    }
    .btn {
        min-height: 50px;
        max-height: 50px;
        min-width: 150px;
        max-width: 150px; 
        float: right; 
    }
    .container {
        margin-left: 310px;
        min-width: 700px;
        max-width: 700px;       
        position:absolute; 
        top:52%;
        left:25%;
        transform: translate(-50%, -50%);
    }
    #client-selected {
        margin-top: 60px;
        border-radius: 10px;
        border: 1px solid;
        min-height: 90px;
        max-height: 90px;
        color: #001f36;
        opacity: 0.5;
    }
    #client-text {
        margin-left: 10px;
        margin-top: 5px;
    }
    #id {        
        float: right;
        margin-right: 20px;
    }
    h1 {
        font-size: 30px;
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
    
</style> 
<script>
</script>   
@endsection