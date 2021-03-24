<?php
session_start(); 
include("../class/ConDB.class.php");

$crud = new CRUD;
 
if(isset($_POST['produtor'])){
	$f['nome_prod']  = $_POST['produtor'];
	$f['nome_track'] = $_POST['track'];
	$f['genero']	 = $_POST['genero'];
	$f['pais']		 = $_POST['pais'];


if (in_array('',$f)){
		echo 'É necessário o prenchimento de todos o campos!';
		}else {
			$sel = $crud->select('nome_track', 'teste_track',"WHERE nome_track = '$f[nome_track]'",array(0));
			$dados = NULL;
		foreach ($sel as $dados);
		if($dados){
			echo 'Nome da musica já cadastrada!';
		}else{
			$crud->insert('teste_track','nome_prod=?,nome_track=?,genero=?,pais=?',array($f['nome_prod'],$f['nome_track'],$f['genero'],$f['pais']));
		echo 'Musica: '.$f['nome_track'].'cadastrada com sucesso';

				}

		}

}

 