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

    public function editar()
    {
      $foto = new Fotos();
      $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
      $titulo = trim(filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING));
      $autor = trim(filter_input(INPUT_POST, "autor", FILTER_SANITIZE_STRING));
      $foto_atual = trim(filter_input(INPUT_POST, "foto_atual", FILTER_SANITIZE_STRING));
      $categoria = filter_input(INPUT_POST, "categoria", FILTER_VALIDATE_INT);
      $descricao = trim(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));

      //Realiza verificação em variavel global $_FILES verificando se há arquivo solicitado para edição
      if(isset($_FILES["nova_foto"]) and !empty($_FILES["nova_foto"]["tmp_name"]))
      {
        $arquivo = $_FILES["nova_foto"];
        $validos = array("image/jpg", "image/jpeg", "image/png");
        if(in_array($arquivo["type"], $validos))
        {
          $nome_arquivo = md5(time()).".jpg";
          move_uploaded_file($arquivo["tmp_name"], "../Public/Assets/images/galeria/".$nome_arquivo);
        }
        else
        {
          echo "<script>window.alert('Arquivo selecionado invalido')</script>";
          echo "<script>window.history.back()</script>";
          return false;
        }
      }
      else
      {
        $nome_arquivo = $foto_atual;
      }

      $foto->updateFoto($id, $titulo, $autor, $nome_arquivo, $categoria, $descricao);
      echo "<script>window.alert('Foto atualizada com sucesso')</script>";
      echo "<script>window.history.back()</script>";
      return true;
    }

    public function excluirFoto($id)
    {
      $foto = new Fotos();
      $foto->deleteFoto($id);
      echo "<script>window.alert('Foto excluida com sucesso')</script>";
      echo "<script>window.history.back()</script>";
      return true;
    }
  }
?>
