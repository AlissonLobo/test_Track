<?php 
include("../class/ConDB.class.php");//CHAMANDO A CLASSE - Class\\ 
$crud = new CRUD;


$sel = $crud->select('*', 'teste_track',"",array(0));
foreach($sel as $dados){
 			echo '<tr>';//Echo. A função echo é a instrução que envia para a saída qualquer informação, podendo conter texto, números ou variáveis.
			echo '<td>'.$dados['nome_prod'].'</td>';
			echo '<td>'.$dados['nome_track'].'</td>';
      echo '<td>'.$dados['genero'].'</td>';
      echo '<td>'.$dados['pais'].'</td>';

			// echo '<td> <button class="editar btn btn-dark" data-id="'.$dados['id'].'">Editar</button> </td>'; //BOTÕES PARA MODIFICAÇÃO
			// echo '<td> <button class="delete btn btn-red" data-id="'.$dados['id'].'">Deletar</button> </td>';			
			// echo '</tr>';

}

 
 ?>


<script>
	
	$(".editar").click(function(){ //JavaScript você declara uma variável com var, uma vez declarada, não necessita mais usar var, só o nome da variável é suficiente.
		// Exemplo abaixo:
	var id = $(this).attr('data-id'); //No JavaScrip você usa $, para declarar uma ação, exemplo na linha acima com o $(".editar").click(function(), que está declarando a ação de clicar o botão editar e realizar uma ação.

	$.ajax({
  type: "POST", 
  data: 'idDados='+id,
  url: "modal-filial-edit.php",
  dataType: 'json',
  success: function(msg){ 
  console.log(msg);
  $("#botao_cad").hide();
  $("#nome_prod").val('');
  $("#pais").val('');
  $("#nome_track").val('');
  $("#genero").val('');
  


  $("#idEdit").val(msg['id']);   
  $("#nome_prod").val(msg['nome_prod']);   //val é valor. 
  $("#pais").val(msg['pais']);     
  $("#nome_track").val(msg['nome_track']);     
  $("#genero").val(msg['genero']);                      //quando você da EDITAR você joga essas informações no campo de preenchimento.


 

   },
  error: function(){
   alert("failure");
  }
 });


})
$(".delete").click(function(){ //Botão deletar
	
var id = $(this).attr('data-id');
$('#iddelete').modal('show'); //Modal de confirmação 

$("#confirmadel").click(function(){ //quer dizer que a pessoa confirmou que vai deletar

$.ajax({
  type: "POST",
  data: 'idDados='+id,
  url: "modal-filial-del.php",
  dataType: 'json',
  success: function(msg){ 
  console.log(msg);
  $('#idteste').modal('show');//modal nesse caso é uma FUNÇÃO, feita para exibir o modal.
  listaDeDados();//listaDados sempre atualiza a pagina sem precisar do F5.
  $('#resultado').html(msg['msg']);


   },
  error: function(){
   alert("failure");
  }
 });
});



})

$('#botao_at').click(function(){ //para chamar ID utiliza-se #. Para mencionar CSS utiliza-se . (PONTO) 
  

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
     	//$('#resultado').html(msg);
     	listaDeDados();

 		console.log(msg);
 		if(msg == 1){
 			$('#resultado').html("É necessário o preenchimento de todos os campos");
 		}else if(msg == 2){
 			listaDeDados();
 			$('#resultado').html("Enviado com sucesso");
 		}else if(msg == 4){
 			$('#resultado').html("E-mail já cadastrado!");
 		}else if(msg == 6){
 			$('#resultado').html("Cadastro atualizado com sucesso!");
			$("#botao_cad").show();
 			$("#nome_prod").val('');
 			$("#pais").val('');
			$("#nome_track").val('');
			$("#genero").val('');
			  
 console.log(dados);
 		}
    },
    error: function(){
    alert("failure");
    }
   });    
 });  

</script>


 


