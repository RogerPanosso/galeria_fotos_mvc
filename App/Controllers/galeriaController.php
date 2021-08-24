<?php
  /*
  * class galeriaController contendo metodos(actions) sendo responsavel por obter controle
  * á página de galeria de fotos(view)
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Fotos;
  use App\Models\Categorias;

  class galeriaController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $foto = new Fotos();
      $categoria = new Categorias();
      $dadosModel = array(
        "fotos" => $foto->getFotos(),
        "categorias" => $categoria->getCategoriasAll(),
      );
      $this->loadTemplate("galeria_fotos", $dadosModel);
    }

    public function editarFoto($id)
    {
      $categoria = new Categorias();
      $foto = new Fotos();
      $dadosModel = array(
        "categorias" => $categoria->getCategoriasAll(),
        "foto" => $foto->getFoto($id)
      );
      $this->loadTemplate("editar_foto", $dadosModel);
    }
  }
?>
