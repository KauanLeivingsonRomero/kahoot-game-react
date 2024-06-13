<?php 
require "suporte.php";
$exec   = new Processo();

//verifica se tem retorno 
if(!empty($_GET)){

    $id = $_GET['id'];

    if($_GET['F'] == 'N'){
        $dados['finalizado'] = 'NAO';
    }else{
        $dados['finalizado'] = 'SIM';
    }

    $exec->setDados($dados, 'tb_reconhecimento', $id);//set os dados
    exit(header("location: ../../posts.php?status=ok")); 
        
}else{ 
    exit(header("location: ../../posts.php"));
}

?>