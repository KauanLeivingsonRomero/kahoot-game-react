<?php 
require "suporte.php";
$exec   = new Processo();

$id = $_POST['id'];
$email = $_POST['email'];
$total_points = $_POST['points'];
$letter = $_POST['letter'];

switch($id){
  case 1:
    $dados = [
      "name" => $_POST['name'],
      "email" => $email,
      "total_points" => $total_points,
    ];
    $dados['answer_1'] = $letter;
    $dados['total_points'] = $total_points;
    $exec->newDados($dados, 'tb_points');
    break;
  case 2:
    $dados['answer_2'] = $letter;
    $dados['total_points'] = $total_points;
    $exec->setDados($dados, 'tb_points', $email);
    break;
  case 3:
    $dados['answer_3'] = $letter;
    $dados['total_points'] = $total_points;
    $exec->setDados($dados, 'tb_points', $email);
    
    break;
  case 4:
    $dados['answer_4'] = $letter;
    $dados['total_points'] = $total_points;
    $exec->setDados($dados, 'tb_points', $email);
    break;
  case 5:
    $dados['answer_5'] = $letter;
    $dados['total_points'] = $total_points;
    $exec->setDados($dados, 'tb_points', $email);
    break;
}

//set os dados
        

?>