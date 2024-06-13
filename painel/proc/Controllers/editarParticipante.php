<?php 
require "suporte.php";
$exec   = new Processo();

//verifica se tem retorno 
if(!empty($_POST)){
    $dados = $_POST;//adiciona os dados do post
    unset($dados['id']);
    $id = $_POST['id'];

    $exec->setDados($dados, 'tb_cadastro', $id);//set os dados
    exit(header("location: ../../localizarCadastros.php?status=ok")); 
    
}else{ 
    exit(header("location: ../../localizarCadastros.php"));
}

?>