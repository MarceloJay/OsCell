@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">
    <form id="client" method="POST" name="client" action="{{ route('clientSave') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
            <h3 class="text-center">Cliente Cadastrado</h3>
        </div> 
        <div class="input-group">
            <input id="input-name" type="search" class="form-control"placeholder="Search.."/>
            <button id="search-button" type="button" class="btn btn-primary">
            <label class="form-label" for="form1">Search</label>
        </div>
        <br>
        <div class="row mb-4">        
            <div class="col">
                <div class="form-outline mb-2">
                    <label class="form-label">Seleciona o Cliente :</label>
                    <select id="cust-select"class="custom-select">                        
                        <!-- <option id="client-select" selected>Seleciona o Cliente</option> -->
                        <!-- <option value=""></option> -->
                    </select>           
                </div>
            </div>
        </div>
        <div>
            <!-- <h3 class="text-center">ou</h3> -->
            <h3 class="text-center">Cadastro de Cliente</h3>
        </div>        
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">        
            <div class="col">
            <div class="form-outline mb-2">
                <label class="form-label" for="form3Example1">Name :</label>
                <input type="text" id="name" name="name" class="form-control" />            
            </div>
            </div>
            <div class="col">
            <div class="form-outline">
                <label class="form-label" for="form3Example2"> Número de CPF ou RG :</label>
                <input type="text" id="document" name="document" class="form-control" />            
            </div>
            </div>
        </div>
        <!-- Email and phone input -->
        <div class="row mb-4">
            <div class="col">
            <div class="form-outline mb-2">
                <label class="form-label" for="form3Example1">Email address :</label>
                <input type="text" id="email" name="email" class="form-control" />            
            </div>
            </div>
            <div class="col">
            <div class="form-outline">
                <label class="form-label" for="form3Example2">Phone number :</label>
                <input type="text" id="phone" name="phone" class="form-control" />            
            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="contact">Contato :</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contato para recado">
        </div>
        <!-- endereço -->
        <div class="form-group">
            <label for="address">Endereço :</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Apartamento, hotel, casa, etc.">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">Cidade :</label>
            <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group col-md-2">
                <label for="">Estado :</label><br>
                <select id="state" name="state">
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
                <label for="cep">CEP :</label>
                <input type="text" class="form-control" id="cep" name="cep">
            </div>
        </div>
        <!-- Submit button -->'
        <!-- <a class="nav-link" href="{{ route('createOrder', [$role_id = 1.1]) }}"> -->
            <button id="btn-save" type="submit" class="btn btn-success btn-block mb-4">Salvar</button'>
        <!-- </a>    -->
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
    .ms-n5 {
        margin-left: -40px;
    }
    #search-button{
        min-height: 38px;
        max-height: 38px;
    }
    #state {
        min-width: 100px;
        max-width: 100px;
        min-height: 40px;
        max-height: 40px;
        /* margin-right: 0px; */
    }
    
</style> 

<script>
    // $(document).ready(function() {
    //     $("#client-select").change(function(){
    //         buscarOndeComprar();
    //     });
    // });
    

    document.getElementById('search-button').onclick = function() {
        
        var name = $('#input-name').val();
        
        // alert(name);

        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "{{ url('searchClient') }}"  + '/' + name,
            type: 'GET',
            data: {name},
            success: function (response) {

                var select = document.getElementById('cust-select');
                for(var i = 0; i < response.length; i++) {
                    var opt = response[i].name;                    
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = opt;
                    select.appendChild(el);
                    if (document.getElementById('name').value == "") {
                        document.getElementById('name').value = opt;
                        document.getElementById('document').value = response[i].document;
                        document.getElementById('email').value = response[i].email;
                        document.getElementById('phone').value = response[i].phone;
                        document.getElementById('contact').value = response[i].contact;
                        document.getElementById('address').value = response[i].address;
                        document.getElementById('city').value = response[i].city;
                        document.getElementById('state').value = response[i].state;
                        document.getElementById('cep').value = response[i].cep;
                    }
                }
                document.getElementById('cust-select').onclick = function() {
                    var $option = $(this).find('option:selected');
                    var value = $option.val();
                    var text = $option.text();
                    for(var i = 0; i < response.length; i++) {
                        var opt = response[i].name;
                        if (opt == text) {
                            document.getElementById('name').value = response[i].name;
                            document.getElementById('document').value = response[i].document;
                            document.getElementById('email').value = response[i].email;
                            document.getElementById('phone').value = response[i].phone;
                            document.getElementById('contact').value = response[i].contact;
                            document.getElementById('address').value = response[i].address;
                            document.getElementById('city').value = response[i].city;
                            document.getElementById('state').value = response[i].state;
                            document.getElementById('cep').value = response[i].cep;
                        }
                    }
                }
            },
            error: function (err){
                console.log("error:", err);
            }
        });
    }

</script>   
@endsection