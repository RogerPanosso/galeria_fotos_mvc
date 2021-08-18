<?php
  /*
  * class notfoundController contendo metodo(action) sendo responsavel por requisitar view(html)
  * de página não encontrada(404) ao usuário final
  */
  namespace App\Controllers;

  use App\Core\Controller;

  class notfoundController extends Controller
  {
    public function index()
    {
      $this->loadView("404");
    }
  }
?>
