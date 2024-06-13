


<div class="container pt-5 mt-5 mt-lg-0 overflow-hidden">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between align-items-md-center mt-5 mt-lg-0">
        <div class="">
            <h4 class="text-purple fw-medium mb-3 mb-md-0">Participante</h4>
        </div>
    </div>
    <h5 class="fw-medium mt-5">Dados do Participante:</h5>
    
        
        <form action="proc/Controllers/editarParticipante.php" method="post">
            <!-- <p class="text-secondary mb-0 mt-3"><small>Opções:</small></p> -->
        <div class="row gx-4">
        <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="wid" id="wid" maxlength="20" placeholder="Id Externo" value="<?php echo $dados[0][7] ?>">
                    <label for="termsLink">Id Externo</label>
                </div>
            </div> -->
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="nome" id="nome" maxlength="149" placeholder="Nome completo" value="<?php echo $dados[0][1]; ?>">
                    <label for="termsLink">Nome completo</label>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="email" id="email" maxlength="149" placeholder="e-mail" value="<?php echo $dados[0][2]; ?>">
                    <label for="termsLink">Email corporativo</label>
                </div>
            </div>
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="cpf" id="businessUnit" placeholder="CPF" value="<?php echo $dados[0][6]  ?>">
                    <label for="titleEvent">CPF</label>
                </div>
            </div> -->
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form .phone-mask" name="Telefone" id="Telefone" placeholder="Whatsapp" maxlength="15" value="<?php echo $dados[0][4]; ?>">
                    <label for="titleEvent">Whatsapp</label>
                </div>
            </div>
        </div>
 Link:  <?php echo $dados[0][8]; ?>
			<br><br>
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <button class="btn btn-purple-to-shadow btn-lg fw-medium" type="submit">Salvar</button>
            <!-- <button class="btn btn-purple-to-shadow btn-lg fw-medium" onclick="history.back()" type="button">Voltar</button> -->
        
        </form>
    </div>
    </div>
</div>
