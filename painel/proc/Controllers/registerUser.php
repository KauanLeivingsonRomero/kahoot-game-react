<?php 
require "suporte.php";
require "../../cors.php";
$exec   = new Processo();

$json = file_get_contents('php://input');
$dados = json_decode($json);

if(!empty($dados)){
    $data['name'] = $dados->name;
    $data['email'] = $dados->email;
    $exec->newDados($data, 'tb_cadastro');
    $exec->newDados($data, 'tb_points');
    exit(); 
        
}else{ 
    var_dump("sem post");
    exit();
}

?>