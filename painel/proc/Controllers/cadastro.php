<?php
  session_start();
  date_default_timezone_set('America/Recife');
  require_once "suporte.php";
  require_once "function/dispositivo.php";

  if(!empty($_POST)){
    var_dump($_POST);
    $exec = new Processo;
    $dados = $_POST;
    $dados['cad_cadastro'] = date('Y-m-d H:i:s');
    $dados['cad_equipamento'] = getDispositivo();
    $dados['cad_ip'] = getUserIP();
    $exec->newDados($dados,"tb_cadastro");
  }
  
?>