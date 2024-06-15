<?php 
require "suporte.php";
require "../../cors.php";
$exec   = new Processo();

$json = file_get_contents('php://input');
$dados = json_decode($json);

if(!empty($dados)){
    $email = $dados->email;
    $points = $dados->points;
    $exec->setDados(['points' => $points], 'tb_points', $email);//set os dados
    exit(); 
        
}else{ 
    var_dump("sem post");
    exit();
}

?>