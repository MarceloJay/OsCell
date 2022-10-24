@extends('layouts.app')

@section('content')
@include('layouts.navigation') 
<div class="container">
    <table class="table table-striped table-bordered dt-responsive nowrap">
        <form>
            <div id="client-selected">
                <label id="client-text" class="client-selected" for="client-selected"> Cliente :</label>            
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
                    <input type="text" id="form3Example2" class="form-control" />            
                </div>
                </div>
                <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example2"> Número de Série :</label>
                    <input type="text" id="form3Example2" class="form-control" />            
                </div>
                </div>
            </div>
            <!-- Email and phone input -->
            <form class="was-validated">
                <div class="mb-3">
                    <label for="validationTextarea">Defeito Relatado pelo Cliente</label>
                    <textarea class="form-control" id="description"></textarea>
                </div>
                    <label for="validationTextarea">Status do Aparelho :</label>
                <div class="custom-control custom-checkbox mb-6">
                    <form>
                        <input type="radio" name="liga" id="customControlValidation1" checked>Aparelho liga</input>
                        <input type="radio" name="liga" id="customControlValidation1">Aparelho não liga</input>
                    </form>
                </div>
                <label for="validationTextarea">Acessórios :</label>
                <div class="custom-control custom-radio mb-4">
                    <form>
                        <input type="radio" name="capinha" VALUE="op1" > Capinha
                        <input type="radio" name="chip" VALUE="op2" > Chip
                        <input type="radio" name="caregador" VALUE="op1" > Carregador
                        <input type="radio" name="cabo" VALUE="op2" > Cabo
                    </form>
                </div>
                <div class="custom-control custom-radio mb-3">
                    <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked">
                    <label class="custom-control-label" for="customControlValidation3">Já passou por outra assitência</label>
                </div>

                <div class="form-group">
                    <select class="custom-select" required>
                    <option value="">Tempo de uso do Aparelho</option>
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
                    <select class="custom-select" required>
                        <option value="3">Serviços</option>
                        <option value="">Trocar tela</option>
                        <option value="1">Trocar bateria</option>
                        <option value="2">Reparo na placa</option>
                        <option value="3">Outros</option>
                    </select>
                    <div class="invalid-feedback">Exemplo de feedback invalido para o select</div>
                </div>
                <div>
                    <label >Foto do Aparelho :</label>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Escolher arquivo...</label>
                </div>
            </form>
            
            <!-- Submit button -->'
            <div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success">Salvar</button>
                    </div> &nbsp;
                    <div class="btn-group">
                        <button id="btn-save" type="button" class="btn btn-primary">Salvar e Imprimir</button>  
                    </div>   
                </div>  
            </div>
            
        </form>
    <table class="table table-striped table-bordered dt-responsive nowrap">
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
    $(document).ready(function() {
        $('#estado').select2();
    });

    document.getElementById('btn-save').onclick = function() {
        var name = $("#plan_app").val();
			
			var markedCheckbox = document.getElementsByName('check');
			var ids = [];
			var counts = [];
			for (var checkbox of markedCheckbox) {
				if (checkbox.checked) {					
					ids.push(checkbox.id.replace('check_',''));	
				} else {
					counts.push(checkbox.id.replace('check_',''));	
				}	
			}

			$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				url: 'actionUpdateSave',
				type: 'POST',
				data: {counts,ids},
				success: function (response) {
					console.log("actionSave response: " + response);
				},
				error: function (err){
					console.log("error:", err);
				}
				
			});
		}
</script>   
@endsection