<?php 
session_start();
if(!isset($_SESSION['id'])){
  exit(header("location: index.php"));
}

$usu_id = $_SESSION['id'];

require_once "proc/Models/Config.class.php";
require_once "proc/Models/ConexaoMysqli.class.php";
require_once "proc/Models/Mysqlsan.class.php";
require_once "proc/Models/ConexaoPdo.class.php";
require_once "proc/Models/Processo.class.php";

$localizar = (isset($_POST['localizar']))?$_POST['localizar']:NULL;

if(!empty($localizar)){

   $exec   = new Processo();
   $campos = $exec->getDadosComposto('cam_campo', 'tb_campos', array('cam_lista'=>'SIM'), array('order by'=>'id asc'));
   $colunas = '';

   foreach ($campos as $item) {
   	foreach ($item as $value) {
   		$colunas .= $value.',';
   	}
   }

   $dados  = $exec->getLocalizar($colunas, $localizar);
   $mostra = TRUE; 
}else{
   $campos=[]; $dados=[]; $mostra = FALSE;
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  

    <title>Painel - Plataforma Control-e</title>
  </head>
  <body class="fw-regular">
    <div class="d-lg-flex flex-lg-row">
      	<?php require('components/navbar.php'); ?>
        <div class="col-12 col-lg-10">
            <?php require('components/localSubs.php'); ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/switchBlockUser.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/msg.js"></script>

    <script>
      $(document).ready( function () {
        $('#tb-pesquisa').DataTable();
      } );
    </script>

    <script>
      function deletaUser(id){

        Swal.fire({
          icon: 'info',
          title: 'Você quer mesmo deletar este Usuário?',
          showDenyButton: true,
          confirmButtonText: 'Deletar',
          denyButtonText: `Cancelar`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire('O usuário será deletado em instantes!', '', 'success');
            setTimeout(function(){window.location.href = "proc/Controllers/deletaParticipante.php?id="+id;} , 3000); 
          } else if (result.isDenied) {
            
          }
        })
      }

      function updatePay(id,usu_id,opcao){

      Swal.fire({
        icon: 'info',
        title: 'Você quer mesmo atualizar o pagamento deste usuário?',
        showDenyButton: true,
        confirmButtonText: 'Sim',
        denyButtonText: `Não`,
      }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
          Swal.fire('O pagamento será atualizado em instantes!', '', 'success');
          setTimeout(function(){window.location.href = "proc/Controllers/updatePayment.php?id="+id+"&log_id="+usu_id+"&opt="+opcao;} , 3000); 
          } else if (result.isDenied) {

          }
        })
      }

      function sendPay(id){

      Swal.fire({
        icon: 'info',
        title: 'Você tem certeza que deseja aprovar este usuário?',
        showDenyButton: true,
        confirmButtonText: 'Sim',
        denyButtonText: `Não`,
      }).then((result) => {
          if (result.isConfirmed) {
          Swal.fire('O e-mail será enviado em instantes!', '', 'success');
          setTimeout(function(){
            $.ajax({
               url:"proc/Controllers/emailPix.php",
               type: "POST",
               dataType: 'json',
               data:{"id": id},        
             });
            } , 1000); 
          } else if (result.isDenied) {
          
          }
        })
      }
    </script>
  </body>
</html>
