<div class="container pt-5 mt-5 mt-lg-0 overflow-hidden">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-between align-items-md-center mt-5 mt-lg-0">
        <div class="">
            <h4 class="text-purple fw-medium mb-3 mb-md-0">Cadastrar participante</h4>
        </div>
    </div>

    <h5 class="fw-medium mt-5">Dados do Participante:</h5>
        <form action="proc/Controllers/cadastraParticipante.php" method="post">
            <!-- <p class="text-secondary mb-0 mt-3"><small>Opções:</small></p> -->
        <div class="row gx-4">
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="wid" id="wid" maxlength="20" placeholder="Id Externo">
                    <label for="termsLink">Id Externo</label>
                </div>
            </div> -->
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="nome" id="nome" maxlength="149" placeholder="Nome completo">
                    <label for="termsLink">Nome</label>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="email" id="email" maxlength="149" placeholder="e-mail">
                    <label for="termsLink">Email</label>
                </div>
            </div>
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="unidade" id="businessUnit" placeholder="Unidade de negocios">
                    <label for="titleEvent">Unidade de negocio</label>
                </div>
            </div> -->
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                <select class="form-select" name="categoria" aria-label="Equipe" required>
                            <option value="" selected disabled>Equipe</option>
                            <option value="specialty">Specialty</option>
                            <option value="genmed">Genmed</option>
                            <option value="vacinas">Vacinas</option>
                        </select>
                </div>
            </div> -->
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="cargo" id="cargo" placeholder="Cargo">
                    <label for="titleEvent">Cargo</label>
                </div>
            </div> -->
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="nascimento" id="nascimento" onkeyup="var v = this.value; if (v.match(/^\d{2}$/) !== null) {this.value = v + '/';} else if (v.match(/^\d{2}\/\d{2}$/) !== null) {this.value = v + '/';}" maxlength="10" placeholder="Data de Nascimento">
                    <label for="titleEvent">Data de Nascimento</label>
                </div>
            </div> -->
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="telefone" id="telefone" placeholder="Telefone">
                    <label for="titleEvent">Telefone</label>
                </div>
            </div> -->
            <!-- <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="cidade" id="cidade" placeholder="Cidade" maxlength="20">
                    <label for="titleEvent">Cidade</label>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control purple-form" name="uf" id="uf" placeholder="UF" maxlength="2">
                    <label for="titleEvent">UF</label>
                </div>
            </div> -->
        </div>
            <button class="btn btn-purple-to-shadow btn-lg fw-medium mb-4" type="submit">Salvar</button>
           <!-- <button class="btn btn-outline-purple-to-shadow btn-lg fw-medium mb-4" onclick="history.back()" type="button">Voltar</button> -->
        
        </form>
    </div>
    </div>
</div>
