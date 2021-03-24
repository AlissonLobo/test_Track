<?php 
 function __autoload($class){require_once"{$class}.classe.php";}


 abstract class ConDB
{
     private static $cnx;
     private function setConn()
     {
          return
          is_null(self::$cnx)?
                         self::$cnx=new PDO('mysql:host=localhost;dbname=track','root',''):
                         self::$cnx;
     }
     public function getConn()
     {
          return $this->setConn();
     }
}


// $crud = new CRUD;

// //$crud->insert('user','nome=?,email=?,status=?', array('Lucas Malagodi','lucas@onzips.com.br','1'));

// $sel = $crud->select('*', 'user','WHERE id=?',array(1));
//  //$sel = $crud->select('*', 'agencia','WHERE id=?',array());


// foreach($sel as $reg)
// {
//      var_dump($reg);
// }



/*

$f['id_cnpj']  = '1';
$f['nome']     = 'Lucas';
$f['sobrenome']     = 'Malagodi';
$f['nome_cracha']   = 'Lucas M';
$f['email']    = 'lucas.malagodi@outllok.com';
$f['cpf'] = '39400684894';
$f['rg']  = '4741168888';
$f['data_nascimento']    = '1991-05-08';
$f['password'] = '213412341234sdf';
$f['fumante']  = '0';


if(in_array('',$f)){
     echo 'Preencha todos os campos';
}else{

     $f['data_cadastro'] = date('Y-m-d h:i:s');
     $f['status']   = '1';

     $select = $crud->select('cpf', 'cadastro_agencia',"WHERE cpf=$f[cpf]",array(0));
     foreach($select as $reg);
     if($reg == NULL){
          $crud->insert('cadastro_agencia','id_cnpj=?,nome=?,sobrenome=?,nome_cracha=?,email=?,cpf=?,rg=?,data_nascimento=?,password=?,fumante=?,data_cadastro=?,status=?', array($f['id_cnpj'],$f['nome'],$f['sobrenome'],$f['nome_cracha'],$f['email'],$f['cpf'],$f['rg'],$f['data_nascimento'],$f['password'],$f['fumante'],$f['data_cadastro'],$f['status']));


          echo 'Cadastrado com sucesso';
     }else{
          echo 'Cpf ja cadastrado';
     }
}



/////Cadastro da Agencia

$f = NULL;

$f['agencia']       = 'Agencia Tur';
$f['cnpj']          = '00000000000000';
$f['filial']        = 'CPQ';

if(in_array('',$f)){
     echo 'Preencha todos os campos';
}else{
     $f['data_cadastro'] = date('Y-m-d h:i:s');
     $f['status']        = '1';
     $selectAgencia = $crud->select('cnpj', 'agencia',"WHERE cnpj=$f[cnpj]",array(0));
     foreach($selectAgencia as $agencia);
     if($agencia == NULL){
          $crud->insert('agencia','agencia=?,cnpj=?,filial=?,data_cadastro=?,status=?', array($f['agencia'],$f['cnpj'],$f['filial'],$f['data_cadastro'],$f['status']));
          echo 'Cadastrado com sucesso';
     }else{
          echo 'Cnpj ja cadastrado';
     }
}

*/

 ?>