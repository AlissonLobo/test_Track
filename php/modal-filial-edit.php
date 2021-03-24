<?php

include("class/ConDB.class.php");//CHAMANDO A CLASSE - Class\\ 

$id  = $_POST['idDados'];



 $crud = new CRUD;

 $sel = $crud->select('*', 'teste_track',"WHERE id = $id",array(0));
 foreach($sel as $dados){ 

echo json_encode(array("erro" => "0", "id" =>$id, "nome_prod" =>$dados['nome_prod'], "pais"=>$dados['pais'],"nome_track"=>$dados['nome_track'],"genero"=>$dados['genero']));




 }

 
?>