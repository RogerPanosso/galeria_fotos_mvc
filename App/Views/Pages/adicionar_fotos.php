<section>
  <div class="container">
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-0 mt-5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="http://localhost/galeria_fotos/home/">home</a>
          </li>
          <li class="breadcrumb-item active">adicionarfotos</li>
        </ol>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-2">
        <div class="page-header">
          <h3 class="lead">Adicionar Foto.
            <small>
              <a class="link-striped" href="#" data-toggle="modal" data-target="#ModalInfoAddFoto">[?]</a>
            </small>
          </h3>
        </div>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <form name="addFoto" method="POST" enctype="multipart/form-data" action="http://localhost/galeria_fotos/adicionarfotos/salvarFoto/">
          <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" autocomplete="off" autofocus placeholder="Título" id="titulo" required/>
          </div>
          <div class="form-group">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" autocomplete="off" placeholder="Autor" id="autor" required/>
          </div>
          <div class="form-group">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" autocomplete="off" id="foto" required/>
          </div>
          <div class="form-group">
            <label for="categoria" class="form-label">Categoria</label>
            <select name="categoria" class="form-control" id="categoria" required>
              <?php
                if(!empty($categorias))
                {
                  foreach ($categorias as $categoria) {
              ?>
              <option value="<?=$categoria['id'];?>" class="font-weight-normal text-dark"><?=$categoria["nome"];?></option>
              <?php
                  }
                }
                else
                {
              ?>
              <option value="" class="font-weight-normal text-dark">Categorias</option>
              <?php
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" rows="5" class="form-control" autocomplete="off" placeholder="Descrição" id="descricao" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block my-2 p-2" onclick="validaFormAddFoto()">Adicionar</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Início modal informações add foto -->
<div class="modal fade" id="ModalInfoAddFoto" tabindex="-1" role="dialog" aria-labelledby="MyModal">
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
              <div class="alert alert-warning fade show shadow-sm" role="alert">
                <small class="mb-0">
                  Olá <?=$_SESSION["login"]["nome"];?> para realizar a adição de uma foto cetifique-se de preencher os campos abaixo
                  corretamente perante o formulário, selecionando arquivos nos quais contenham extenções como:
                  <mark class="bg-light">.jpg</mark>, <mark class="bg-light">.jpeg</mark> ou <mark class="bg-light">.png</mark>
                  para serem processados corretamente e obter a adição.
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-light">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fim modal informações add foto -->
