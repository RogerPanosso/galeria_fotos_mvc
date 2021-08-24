<section>
  <div class="container">
    <div class="row mb-0">
      <div class="col-md-12 order-1 mt-5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?=BASE_URL;?>home/">home</a>
          </li>
          <li class="breadcrumb-item active">cadastrouser</li>
        </ol>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <div class="page-header">
          <h3 class="lead">Faça seu Cadastro.
            <small>
              <a class="alert-link" href="#" data-toggle="modal" data-target="#ModalInformacoesCadastroUser">[?]</a>
            </small>
          </h3>
        </div>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <form name="cadastroUser" method="POST" action="<?=BASE_URL;?>cadastrouser/salvarCadastro/">
          <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" autocomplete="off" placeholder="Nome" id="nome" required/>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" autocomplete="off" placeholder="exemplo@hotmail.com" id="email" required/>
          </div>
          <div class="form-group">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" autocomplete="off" placeholder="Senha" id="senha" required/>
          </div>
          <div class="form-group">
            <label for="confirm_senha" class="form-label">Confirmar Senha</label>
            <input type="password" name="confirm_senha" class="form-control" autocomplete="off" placeholder="Confirmar Senha" id="confirm_senha" required/>
          </div>
          <button type="submit" class="btn btn-primary btn-block my-2 p-2" onclick="return validaFormCadastroUser()">Cadastrar</button>
        </form>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <p class="text-center text-dark">
          Já possui cadastro ? <a class="link-striped" href="<?=BASE_URL;?>loginuser/">Faça seu login.</a>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Início modal informações cadastro user -->
<div class="modal fade" id="ModalInformacoesCadastroUser" tabindex="-1" role="dialog" aria-labelledby="MyModal">
  <div class="modal-dialog shadow-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title mb-0"><i class="fa fa-info"></i> Informações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 order-1 mb-0">
              <p class="mb-0">
                Olá para realizar seu cadastro como <mark>usuário(a)</mark> preencha os campos abaixo perante o formulário,
                informando seu nome, email, sua senha e realize a confirmação para obter seu cadastro.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim modal informações cadastro user -->
