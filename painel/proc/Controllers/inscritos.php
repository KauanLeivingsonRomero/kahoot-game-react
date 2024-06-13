<?php 

require_once "proc/Models/Config.class.php";
require_once "proc/Models/ConexaoMysqli.class.php";
require_once "proc/Models/Mysqlsan.class.php";
require_once "proc/Models/ConexaoPdo.class.php";
require_once "proc/Models/Processo.class.php";

$proc  = new Processo();  
$total = $proc->getCountTotal();
?>