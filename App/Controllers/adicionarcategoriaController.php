<?php
  /*
  * class adicionarcategoriaController contendo metodos(actions) sendo responsavel
  * por obter controle á adições de categorias(view)
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Categorias;

  class adicionarcategoriaController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function salvarCategoria()
    {
      $categoria = new Categorias();
      $nome_categoria = trim(filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_STRING));
      if($categoria->salvarCategoria($nome_categoria) == true)
      {
        echo "<script>window.alert('Categoria adicionada com sucesso !!')</script>";
        echo "<script>window.history.back()</script>";
        return true;
      }
      else
      {
        echo "<script>window.alert('Categoria não adicionada. Pois já se encontra ativa !!')</script>";
        echo "<script>window.history.back()</script>";
        return true;
      }
    }
  }
?>
