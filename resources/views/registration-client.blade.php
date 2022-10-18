@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">
    <form>
        <div class="row mb-4">        
            <div class="col">
                <div class="form-outline mb-2">
                    <select class="custom-select">
                        <option selected>Seleciona o Cliente</option>
                    </select>           
                </div>
            </div>
        </div>
        <div>
            <h3 class="text-center">ou</h3>
            <h3 class="text-center">Cadastro de cliente</h3>
        </div>        
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">        
            <div class="col">
            <div class="form-outline mb-2">
                <label class="form-label" for="form3Example1">Name</label>
                <input type="text" id="form3Example1" class="form-control" />            
            </div>
            </div>
            <div class="col">
            <div class="form-outline">
                <label class="form-label" for="form3Example2"> Número de CPF ou RG:</label>
                <input type="text" id="form3Example2" class="form-control" />            
            </div>
            </div>
        </div>
        <!-- Email and phone input -->
        <div class="row mb-4">
            <div class="col">
            <div class="form-outline mb-2">
                <label class="form-label" for="form3Example1">Email address</label>
                <input type="text" id="form3Example1" class="form-control" />            
            </div>
            </div>
            <div class="col">
            <div class="form-outline">
                <label class="form-label" for="form3Example2">Phone number</label>
                <input type="text" id="form3Example2" class="form-control" />            
            </div>
            </div>
        </div>
        
        <!-- endereço -->

        <div class="form-group">
            <label for="inputAddress">Endereço</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Endereço 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-2">
                <label for="">Estado:</label><br>
                <select id="estado">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCEP">CEP</label>
                <input type="text" class="form-control" id="inputCEP">
            </div>
        </div>
        <!-- Submit button -->'
        <a class="nav-link" href="{{ route('createOrder', [$role_id = 1.1]) }}">
            <button type="submit" class="btn btn-success btn-block mb-4">Salvar</button'>
        </a>   
    </form>
    
</div>

<style>
    html, body {
        background-color: var(--background-default);
    }
    .btn {
        min-height: 50px;
        max-height: 50px;
        min-width: 100px;
        max-width: 100px;
        float: right;
    }
    .container {
        margin-left: 310px;
        /* margin-top: -600px; */ 
        min-width: 700px;
        max-width: 700px;       
        position:absolute; 
        top:52%;
        left:25%;
        transform: translate(-50%, -50%);
    }
    #estado {
        min-width: 100px;
        max-width: 100px;
        min-height: 40px;
        max-height: 40px;
        /* margin-right: 0px; */
    }
    
</style> 
<script>
    $(document).ready(function() {
        $('#estado').select2();
    });

</script>   
@endsection