<?php 
require "suporte.php";
$exec   = new Processo();

//verifica se tem retorno 
if(!empty($_POST)){
    $dados = $_POST;//adiciona os dados do post
    
    $exec->newDados($dados, 'tb_cadastro');//set os dados
    exit(header("location: ../../localizarCadastros.php?status=ok")); 
        
}else{ 
    exit(header("location: ../../localizarCadastros.php"));
}

?>