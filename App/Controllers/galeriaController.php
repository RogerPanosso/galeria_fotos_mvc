<?php
  /*
  * class galeriaController contendo metodos(actions) sendo responsavel por obter controle
  * á página de galeria de fotos
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Fotos;

  class galeriaController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $foto = new Fotos();
      $dadosModel = array("fotos" => $foto->getFotos());
      $this->loadTemplate("galeria", $dadosModel);
    }
  }
?>
