<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 order-1 mt-5">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a class="link-striped" href="http://localhost/galeria_fotos/home/">home</a>
          </li>
          <li class="breadcrumb-item">
            <a class="link-striped" href="http://localhost/galeria_fotos/galeria/">galeria</a>
          </li>
          <li class="breadcrumb-item active">
            editarFoto/<?=$foto["id"];?>
          </li>
        </ol>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <div class="page-header">
          <h3 class="lead">Editar Foto(#<?=$foto["id"];?>)
            <small>
              <a class="link-striped" href="#" data-toggle="modal" data-target="#ModalInfoEditarFoto">[?]</a>
            </small>
          </h3>
        </div>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-3">
        <form name="editarFoto" method="POST" enctype="multipart/form-data" action="http://localhost/galeria_fotos/galeria/editar/<?=$foto["id"];?>">
          <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <!-- input(hidden) contendo valor de id -->
            <input type="hidden" name="id" class="form-control" value="<?=$foto["id"];?>" id="id"/>
            <input type="text" name="titulo" class="form-control" value="<?=$foto["titulo"];?>" id="titulo"/>
          </div>
          <div class="form-group">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="<?=$foto["autor"];?>" id="autor"/>
          </div>
          <div class="form-group">
            <label for="nova_foto" class="form-label">Nova Foto</label>
            <!-- input(hidden) contendo valor atual de arquivo(url) -->
            <input type="hidden" name="foto_atual" class="form-control" value="<?=$foto["foto"];?>" id="foto_atual"/>
            <input type="file" name="nova_foto" class="form-control" id="nova_foto"/>
          </div>
          <div class="form-group">
            <label for="categoria" class="form-label">Categoria</label>
            <select name="categoria" class="form-control" id="categoria">
              <?php foreach($categorias as $categoria): ?>
                <option value="<?=$categoria["id"];?>" class="text-dark" <?=($categoria["id"] == $foto["categoria"])?"selected":"";?>><?=$categoria["nome"];?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" rows="5" class="form-control" id="descricao"><?=$foto["descricao"];?></textarea>
          </div>
          <button type="submit" class="btn btn-info btn-block mb-3">Editar</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Início modal informações editar -->
<div class="modal fade" id="ModalInfoEditarFoto" tabindex="-1" role="dialog" aria-labelledby="MyModal">
  <div class="modal-dialog shadow-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title mb-0">
          <i class="fa fa-info"></i> Informações
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 order-1">
              <div class="alert alert-warning fade show shadow-sm bd-lead text-center" role="alert">
                <small class="mb-0">
                  Olá <?=$_SESSION["login"]["nome"];?> caso deseje atualizar a foto específica certifique-se de selecionar arquivos
                  nos quais contenham as seguintes extenções: <mark class="bg-light">.jpg</mark>, <mark class="bg-light">.jpeg</mark> ou <mark class="bg-light">.png</mark>
                </small>
              </div>
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
<!-- Fim modal informações editar -->
