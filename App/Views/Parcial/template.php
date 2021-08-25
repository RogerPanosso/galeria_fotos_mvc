<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="Galeria de Fotos"/>
    <meta name="author" content="Roger Panosso"/>
    <meta name="keywords" content="Galeria de Fotos"/>
    <link rel="stylesheet" href="http://localhost/galeria_fotos/Public/Bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://localhost/galeria_fotos/Public/Bootstrap/css/bootstrap-reboot.min.css"/>
    <link rel="stylesheet" href="http://localhost/galeria_fotos/Public/Assets/css/style.css"/>
    <link rel="stylesheet" href="http://localhost/galeria_fotos/Public/Fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="http://localhost/galeria_fotos/Public/Fontawesome/css/fontawesome.min.css"/>
  </head>
  <body>
    <article>
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="http://localhost/galeria_fotos/">
                <img src="http://localhost/galeria_fotos/Public/Assets/images/logo.png" class="img-fluid shadow-sm border border-dark" title="Galeria" alt="Galeria"/>
              </a>
            </div>
            <button type="button" class="navbar-toggler btn btn-default" data-toggle="collapse" data-target="#NavbarMenu">
              <img src="http://localhost/galeria_fotos/Public/Assets/images/menu.png" title="Menu" alt="Menu"/>
            </button>
            <div class="collapse navbar-collapse" id="NavbarMenu">
              <ul class="navbar-nav ml-auto mb-0">
                <li class="nav-item">
                  <a class="nav-link active" href="http://localhost/galeria_fotos/home/">
                    <span class="nav-link-text"><i class="fa fa-home"></i> Home</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#ModalSobreProjeto">
                    <span class="nav-link-text"><i class="fa fa-info"></i> Sobre</span>
                  </a>
                </li>
                <?php
                  //estabelece validação em sessão de usuário logado para obter acesso a funcionalidades
                  if(isset($_SESSION["login"]) and !empty($_SESSION["login"]))
                  {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-toggle="modal" data-target="#ModalAddCategoria">
                    <span class="nav-link-text"><i class="fab fa-accusoft"></i> Adicionar Categoria</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/galeria_fotos/adicionarfotos/">
                    <span class="nav-link-text"><i class="fa fa-images"></i> Adicionar Foto</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/galeria_fotos/galeria/">
                    <span class="nav-link-text"><i class="fas fa-camera-retro"></i> Acessar Galeria</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn btn-warning dropdown-toggle" href="#" data-toggle="dropdown" id="DropdownUserLogin">
                    <span class="nav-link-text"><i class="fas fa-user-alt"></i> Usuário</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labely="DropdownUserLogin">
                    <span class="my-2 m-3"><i class="fa fa-user"></i> <?=$_SESSION["login"]["nome"];?></span>
                    <div class="w-100"></div>
                    <span class="my-2 m-3"><i class="fas fa-at"></i> <?=$_SESSION["login"]["email"];?></span>
                    <a class="dropdown-item mt-2 text-dark" href="#" data-toggle="modal" data-target="#ModalLogout">
                      <span class="nav-link-text"><i class="fas fa-power-off"></i> Sair</span>
                    </a>
                  </div>
                </li>
                <?php
                  }
                  else
                  {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/galeria_fotos/cadastrouser/">
                    <span class="nav-link-text"><i class="fas fa-user-plus"></i> Cadastre-se</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://localhost/galeria_fotos/loginuser/">
                    <span class="nav-link-text"><i class="fas fa-sign-in-alt"></i> Fazer Login</span>
                  </a>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!---------------------------------------------------->
      <?=$this->loadViewInTemplate($nomeView, $dadosModel);?>
      <!---------------------------------------------------->
      <footer class="bg-dark">
        <div class="container-fluid">
          <div class="row mb-0">
            <div class="col-md-12 order-1 mt-3 mb-2 text-center">
              <span class="text-light">Copyright <i class="far fa-copyright"></i> <?=date("Y");?></span>
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-12 order-1 mb-3 text-center">
              <a href="https://facebook.com/roger.panosso9" class="mr-2 ml-2" target="_blank"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/rogerpanosso" class="mr-2 ml-2" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://instagram.com/rogerpanosso" class="mr-2 ml-2" target="_blank"><i class="fab fa-instagram"></i></a>
              <a href="https://github.com/RogerPanosso" class="mr-2 ml-2" target="_blank"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
      </footer>
    </article>
    <script src="http://localhost/galeria_fotos/Public/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="http://localhost/galeria_fotos/Public/Bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/galeria_fotos/Public/Assets/js/script.js"></script>
    <script src="http://localhost/galeria_fotos/Public/Fontawesome/js/all.min.js"></script>
    <script src="http://localhost/galeria_fotos/Public/Fontawesome/js/fontawesome.min.js"></script>
    <!-- Início modal sobre projeto -->
    <div class="modal fade" id="ModalSobreProjeto" tabindex="-1" role="dialog" aria-labelledby="MyModal">
      <div class="modal-dialog shadow-sm modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title mb-0"><i class="fa fa-info"></i> Sobre o Projeto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-12 order-1 mb-0">
                  <div class="alert alert-info fade show bd-lead text-center" role="alert">
                    Este projeto é baseado em uma galeria de fotos possuindo diversas categorias de estilos fotograficos,
                    podendo ser acessadas por diversas categorias especificas, por autores, bem como podendo ser adicionadas
                    novas fotos perante a galeria em uma quantidade ilimitada sendo fotografias diferenciadas.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim modal sobre projeto -->
    <!-- Início Modal Logout -->
    <div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="MyModal">
      <div class="modal-dialog shadow-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title">Encerrar Sessão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-12 order-1 mb-0">
                  <p class="text-muted mb-0 text-center">
                    Deseja encerrar sua sessão atual de login ?
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer bg-light">
            <a class="btn btn-primary" href="http://localhost/galeria_fotos/loginuser/logout/">Sim</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fim Modal Logout -->
    <!-- Início modal adicionar categoria -->
    <div class="modal fade" id="ModalAddCategoria" tabindex="-1" role="dialog" aria-labelledby="MyModal">
      <div class="modal-dialog shadow-sm modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title mb-0">Adicionar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-12 order-1 mb-0">
                  <div class="alert alert-warning fade show text-center shadow-sm" role="alert">
                    <p class="mb-0">
                      <small class="mb-0">
                        Digite perante o campo abaixo o nome da categoria na qual deseja adicionar.
                      </small>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row mb-0">
                <div class="col-md-12 order-1 mb-0">
                  <form name="addCategoria" method="POST" action="http://localhost/galeria_fotos/adicionarcategoria/salvarCategoria/">
                    <div class="form-group">
                      <label for="categoria" class="form-label">Categoria</label>
                      <input type="text" name="categoria" class="form-control" autocomplete="off" autofocus placeholder="Ex: Modas" id="modas" required/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer bg-light">
              <button type="submit" class="btn btn-info" onclick="return validaFormAddCategoria()">Adicionar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Fim modal adicionar categoria -->
  </body>
</html>
