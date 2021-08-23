<section id="loginUser">
  <div class="container">
    <div class="areaLoginUser">
      <div class="figure d-flex justify-content-center mb-3">
        <img src="<?=BASE_URL;?>Public/Assets/images/logo.png" class="figure-img img-fluid rounded shadow-sm" title="Photo" alt="Photo"/>
      </div>
      <form name="login" method="POST" action="<?=BASE_URL;?>loginuser/login/">
        <div class="form-group">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" name="email" class="form-control" autofocus autocomplete="off" placeholder="E-Mail" id="email" required/>
        </div>
        <div class="form-group">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" class="form-control" autocomplete="off" placeholder="Senha" id="senha" required/>
        </div>
        <button type="submit" class="btn btn-primary btn-block my-2 p-2 mb-3 font-weight-normal" onclick="return validaFormLogin()">Entrar</button>
      </form>
      <hr class="bg-light">
      <p class="bd-lead text-center mb-2">
        Esqueceu sua senha ? <a class="link-striped" href="#" data-toggle="modal" data-target="#ModalEsqueciSenha">Clique aqui.</a>
      </p>
      <p class="bd-lead text-center">
        Não se cadastro ? <a class="link-striped" href="<?=BASE_URL;?>cadastrouser/">Cadastre-se.</a>
      </p>
    </div>
  </div>
</section>
<!-- Início modal esqueci senha -->
<div class="modal fade" id="ModalEsqueciSenha" tabindex="-1" role="dialog" aria-labelledby="MyModal">
  <div class="modal-dialog shadow-sm modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title mb-0">Atualizar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 order-1 mb-0">
              <div class="alert alert-warning fade show text-center" role="alert">
                <p class="mb-0">
                  <small class="mb-0">
                    Informe seu endereço de e-mail cadastrado realizando atualização de sua senha.
                  </small>
                </p>
              </div>
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-12 order-1 mb-0">
              <form name="esqueciSenha" method="POST" action="<?=BASE_URL;?>loginuser/esqueciSenha/">
                <div class="form-group">
                  <label for="email" class="form-label">E-Mail</label>
                  <input type="email" name="email" class="form-control" autocomplete="off" placeholder="exemplo@hotmail.com" id="email" required/>
                </div>
                <div class="form-group">
                  <label for="nova_senha" class="form-label">Nova Senha</label>
                  <input type="password" name="nova_senha" class="form-control" autocomplete="off" placeholder="Nova Senha" id="nova_senha" required/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer bg-light">
          <button type="submit" class="btn btn-primary">Atualizar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Fim modal esqueci senha -->
