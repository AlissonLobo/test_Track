<?php

include("class/ConDB.class.php");//CHAMANDO A CLASSE - Class\\ 

$id  = $_POST['idDados'];



 $crud = new CRUD;
    
 $del = $crud->delete('teste_track','WHERE id=?', array($id));
 

echo json_encode(array("erro" => "0", "msg" =>"Registro deletado com sucesso"));




 
?>