
<div class="container pt-5 mt-5 mt-lg-0 overflow-hidden">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between align-items-md-center">
        <div class="">
            <h4 class="text-purple fw-medium mb-0">Listar Usuários</h4>
        </div>
        <div class="">
            <form action="localizarCadastros.php" method="post">
            <div class="input-group">
                <span class="input-group-text input-group-text-custom"><i class="bi bi-search"></i></span>
                <input type="search" name="localizar" id="localizar" class="form-control border-start-0" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-purple-to-shadow fw-medium py-3" type="submit">Buscar</button>
                <a href="cadastraParticipante.php" class="btn btn-outline-purple-to-shadow fw-medium py-3">Novo cadastro</a>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="container pt-5 mt-5 mt-lg-0 overflow-hidden">
    <!-- <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between align-items-md-center">
    <div class="">
        <h4 class="text-purple fw-medium mb-0">Listar Usuários</h4>
    </div>
    <div class="">
        <form action="localizarCadastros.php" method="post">
            <div class="input-group">
                <span class="input-group-text input-group-text-custom"><i class="bi bi-search"></i></span>
                <input type="search" name="localizar" id="localizar" class="form-control border-start-0" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-purple-to-shadow fw-medium py-3" type="submit">Buscar</button>
                <a href="cadastraParticipante.php"><button class="btn btn-outline-purple-to-shadow fw-medium py-3" type="button">Novo cadastro</button></a>
            </div>
        </form>
    </div>
    </div> -->


    <div class="table-resposive mt-5">
        <div class="table-responsive">
            <table class="table mt-4" id="tb-pesquisa">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Código</th>
                        <th scope="col">Link</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
            <tbody>
                    <?php 
                    if(!empty($_POST)){
                    if(!empty($dados)){
                    foreach($dados as $dado){

                        echo '
                        <tr>
                            <td>'.$dado['id'].'</td>
                            <td>'.$dado['nome'].'</td>
                            <td>'.$dado['email'].'</td>
                            <td>'.$dado['codigo'].'</td>
                            <td>'.$dado['link'].'</td>
                            <td><a class="btn btn-warning btn-sm" href="editarParticipante.php?id='.$dado['id'].'" role="button">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deletaUser('.$dado['id'].')"><i class="bi bi-trash"></i>Excluir</button>
                            </td>
                        </tr>';
                    } 
                }else{
                    echo '
                    <tr>
                        <td></td>
                        <td></td>
                        <td><center>Nenhum registro localizado!</center></td>
                        <td></td>
                    </tr>';
                }
            }else{

            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>


        <!-- <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="fw-regular">Nome</th>
                    <th scope="col" class="fw-regular">E-mail</th>
                    <th scope="col" class="fw-regular">Telefone</th>
                    <th scope="col" class="fw-regular"></th>
                </tr>
            </thead>
            <tbody>
                <?php echo $lista; ?>
            </tbody>
        </table> -->
