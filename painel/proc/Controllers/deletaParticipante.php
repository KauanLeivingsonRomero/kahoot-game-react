<?php
session_start();
date_default_timezone_set('America/Recife');
require_once "../Models/Config.class.php";
require_once "../Models/ConexaoPdo.class.php";
require_once "../Models/Processo.class.php";

if(isset($_GET['id'])){

       $exec = new Processo();
       $id   = $_GET['id'];

       $exec->delDados('tb_cadastro', $id);
       exit(header('location: ../../localizarCadastros.php'));

}

?>