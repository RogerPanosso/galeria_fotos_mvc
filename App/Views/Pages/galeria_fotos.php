<section>
  <div class="container">
    <div class="row mb-0">
      <div class="col-md-12 order-1 mt-5 mb-3">
        <div class="page-header">
          <h3 class="lead text-center">Galeria.</h3>
        </div>
      </div>
    </div>
    <div class="row mb-0">
      <div class="col-md-12 order-1 mb-2">
        <div class="alert alert-warning fade show shadow-sm bd-lead text-center" role="alert">
          <small class="mb-0">
            Olá <?=$_SESSION["login"]["nome"];?> segue abaixo as seguintes fotos publicadas atualmente perante a galeria !!
          </small>
        </div>
      </div>
    </div>
    <div class="row mb-0">
      <?php
        if(!empty($fotos))
        {
          foreach ($fotos as $foto) {
      ?>
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <img src="<?=BASE_URL;?>Public/Assets/images/galeria/<?=$foto['foto'];?>" width="500" height="250" class="card-img-top"/>
          <div class="card-body">
            <div class="card-title">
              <h5 class="alert-heading"><?=$foto["titulo"];?></h5>
              <hr>
            </div>
            <div class="card-text">
              <div class="d-flex justify-content-between">
                <small class="font-weight-normal"><text class="text-primary">Autor:</text> <?=$foto["autor"];?></small>
                <small class="font-weight-normal"><text class="text-primary">Categoria:</text> <?=$foto["nome"];?></small>
              </div>
              <div class="w-100 p-1"></div>
              <small class="font-weight-normal"><text class="text-primary">Descrição:</text> <?=$foto["descricao"];?></small>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-center">
              <a class="btn btn-info" href="<?=BASE_URL;?>galeria/editarFoto/<?=$foto["id"];?>"><i class="fa fa-edit"></i> Editar</a>
              <a class="btn btn-danger" href="<?=BASE_URL;?>galeria/excluirFoto/<?=$foto["id"];?>"><i class="fa fa-trash"></i> Excluir</a>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        }
        else
        {
      ?>
      <div class="col-md-12 order-1">
      <div class="alert alert-danger fade show alert-dismissible bd-lead text-center" role="alert">
        <a class="close" href="#" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </a>
        <small class="mb-0">
          <?=$_SESSION["login"]["nome"];?> não há fotos adicionadas perante a galeria no momento !!
        </small>
      </div>
    </div>
      <?php
        }
      ?>
    </div>
  </div>
</section>
