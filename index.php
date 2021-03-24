<?php
session_start();
include_once("class/ConDB.class.php");//CHAMANDO A CLASSE - Class\\ 
 


$crud = new CRUD;
header('Content-Type: text/html; charset=UTF-8');
$sel=$crud->select('*', 'test',"", array(0));

  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale = 1, shrink-tp-fit=no">
	<title>CRUD - Cadastrar</title>		
	<link rel="stylesheet"  href="plugin/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="plugin/css/style.css">
 	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> <!-- SEMPRE VERIFICAR SE A PASTA IMAGEM e PLUGIN estão na mesma pasta do index-->
</head>
<body>
		<div class="container">
			<div class="row">
				<div class="col-12">					
					<table class="table">
					  <thead>
					    <tr>
					     <th scope="col">Produtor:</th>
					      <th scope="col">Track:</th>
					      <th scope="col">Gênero</th>
					      <th scope="col">País</th>
					    </tr>
					  </thead>
					  <tbody id="listaDeDados">
					  </tbody>
					</table>
 				</div>
			</div>
		</div>

		<h1><p class="text-center" style = "font-family:courier,arial,helvetica;margin-top: 25px;">
		Cadastro de Track</p>
		</h1>
	 		<div class="container">
				<div class="row">
					<div class="col-12">
					 	<form class="form_cad" id="form_cad ">					 
						<div class="col-12"> 
						 	<div class="form-group">
						 		<label>Produtor:</label>
						 		<input type="text" name="produtor" class="form-control" id="produtor" placeholder="Digite o nome do seu produtor."><br><br>
						 	</div>
						</div> 
						<div class="col-12">						
						 	<div class="form-group">
						 		<label>Track:</label>
						 		<input type="text" name="track" class="form-control" id="track" placeholder="Digite o nome da sua track ?"><br><br>
						 	</div>
						</div>
						<div class="col-12"> 					 		
						 	<div class="form-group">
						 		<label>Gênero:</label>
						 		<input type="text" name="genero" class="form-control" id="genero" placeholder="Informe seu Gênero musical:"><br><br>
						 	</div>
						</div>
						<div class="col-12"> 		 		
		 				 	<div class="form-group">
						 		<label>País:</label>
						 		<input type="text" name="pais" class="form-control" id="pais" placeholder="Qual o país do artista ?"><br><br>
						 	</div>
						</div> 
 							<button type="button" id="botao_cad" class="btn btn-dark">Cadastrar</button>
 						</form>
					</div>
				</div>
         <!-- Modal sempre identificar o seu modal no html para conseguir mencionar ele no ajax --> 
            <div class="modal fade" id="idteste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> 	Informações de cadastro: </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="resultado">                      
                        </div>
                        <div class="modal-footer botao_cad">
                            <button type="button" class="btn btn btn-primary" data-dismiss="modal">FECHAR</button>          
                       	</div>
                    </div>
                </div>
            </div>
	        <div class="modal fade" id="iddelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
	        aria-hidden="true">
	        <div class="modal-dialog" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="exampleModalLabel"> Confirmação: </h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-footer botao_cad">
	                    <button type="button" class="btn btn btn-primary" data-dismiss="modal" id="form_cad">CONFIRMAR</button>
	               	  <button type="button" class="btn btn btn-primary" data-dismiss="modal">FECHAR</button>
	               	</div>
	            </div>
	        </div>
	    </div> 
	</div>	




</body>
<script type="text/javascript" src="plugin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="plugin/js/popper.min.js"></script>
<script type="text/javascript" src="plugin/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
///CADASTRO DE DADOS NO BANCO
$(document).ready(function(){
	$("#botao_at").hide();
})

///FORMULÁRIO 
 
$('#botao_cad').click(function(){ //para chamar ID utiliza-se #. Para mencionar CSS utiliza-se . (PONTO) 


  var data;
  var contentType = "application/x-www-form-urlencoded";
  var processData = true;
  
  //existem duas formas de envio o GET e o POST, get envia pela URL e o post não pela URL.
  data = new FormData($('form.form_cad').get(0));//seleciona classe form-horizontal adicionada na tag form do html

  contentType = false;
  processData = false;
   $.ajax({
   type: "POST", //metodo de envio
   data: data, //recebendo variavel data... recebendo os valores do formulario.
   url: "php/processa.php", //aqui é onde vai enviar os dados para o arquivo processa.php
   contentType: contentType,
   processData: processData,
 
    success: function(msg){
    	$('#idteste').modal('show');//modal nesse caso é uma FUNÇÃO, feita para exibir o modal.
    	$('#resultado').html(msg);
 		console.log(msg); 
 		if(msg == 1){			
 			$('#resultado').html("É necessário o preenchimento de todos os campos");
 		}else if(msg == 2){
 			listaDeDados();
 			$('#resultado').html("Enviado com sucesso");
 		 	$('#nome_prod').val('');//val vai substituir o valor de cada campo do formulario... '' zera o campo depois do submit... ""
 		 	$('#pais').val('');
 		 	$('#nome_track').val('');
 		 	$('#genero').val('');



 		}else if(msg == 4){
 			$('#resultado').html("E-mail já cadastrado!");
 		}
    },
    error: function(){
    alert("failure");
    }
   });    
 });  
///FIM FORMULÁRIO


/////LISTA

	listaDeDados();

	function listaDeDados(){
	$("#listaDeDados").empty();  
		$.post('php/listaDados.php', function(dados){
			$("#listaDeDados").html(dados);

		}); 

	}

////FIM LISTA





</script>

</html>