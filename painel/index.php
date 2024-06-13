<?php 
if(isset($_SESSION['id'])){
  session_start();
  exit(header('location: subs.php'));
}

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imgs/favicon.png">
    <meta name="theme-color" content="#9E0CAB">

    <title>Painel - Plataforma Control-e</title>
  </head>
  <body class="bg-white text-black">
    <div class="vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="col-11 col-md-6 col-lg-3">
        <div class="text-center">
        <img src="https://res.cloudinary.com/control-e/image/upload/q_auto/f_auto/v1705335239/global/Logo_r6gjiy.png" alt="Logo" class="img-fluid">
        <h4 class="fw-medium mt-4">Acesso ao painel</h4>
        </div>

        <form action="proc/Controllers/verifica.php" method="post">
        <?php if(isset($_GET['msg'])){ echo '<h5 class="text-center text-purple fw-small">Dados não localizados.</h5>'; }?>
          <div class="form-floating mb-3">
            <input type="email" class="form-control purple-form" name="email" id="email" placeholder="E-mail" inputmode="email" required>
            <label for="email">E-mail</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control purple-form" name="senha" id="password" placeholder="Password" required>
            <label for="password">Senha</label>
          </div>
          <div class="d-grid mt-3">
            <button type="submit" class="btn btn-blue-to-ouline-blue fw-bold py-3">Entrar</button>
          </div>
        </form>
      </div>
    </div>

    <?php include('components/footer-login.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
