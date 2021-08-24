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
      $filtro_categoria = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_STRING);
      $foto = new Fotos();
      $categoria = new Categorias();
      $dadosModel = array(
        "fotos" => $foto->getFotos($filtro_categoria),
        "categorias" => $categoria->getCategoriasAll(),
        "filtro" => $filtro_categoria
      );
      $this->loadTemplate("galeria_fotos", $dadosModel);
    }
  }
?>
