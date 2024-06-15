<?php 
require "suporte.php";
require "../../cors.php";
$exec   = new Processo();

//verifica se tem retorno 
if(!empty($_POST)){
    $dados = $_POST['name'];//adiciona os dados do post
    $dados .= $_POST['email'];
    var_dump($dados);
    $exec->newDados(array($dados), 'tb_cadastro');//set os dados
    exit(); 
        
}else{ 
    exit();
}

?>