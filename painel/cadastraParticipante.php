<?php 
session_start();
if(!isset($_SESSION['id'])){
  exit(header("location: index.php"));
}
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/favicon.png">
    <meta name="theme-color" content="#9E0CAB">


    <title>Painel - Plataforma Control-e</title>
  </head>
  <body class="fw-regular">
    <div class="d-lg-flex flex-lg-row">
      	<?php if ($_SESSION['usu_tipo'] == 'C' or $_SESSION['usu_tipo'] == 'M') { 
       require('components/navbar.php'); 
	}else{ 
	   require('components/navbar_basic.php');
	  } ?>
        <div class="col-12 col-lg-10">
            <?php require('components/cadastraParticipante.php'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/msg.js"></script>

  </body>
</html>
