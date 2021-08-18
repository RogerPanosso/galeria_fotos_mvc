<?php
  /*
  * class adicionarfotosController contendo metodos(actions) sendo responsavel por
  * obter controle á página de adição de fotos(view)
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Fotos;
  use App\Models\Categorias;

  class adicionarfotosController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $categoria = new Categorias();
      $dadosModel = array("categorias" => $categoria->getCategoriasAll());
      $this->loadTemplate("adicionar_fotos", $dadosModel);
    }

    public function salvarFoto()
    {
      $foto = new Fotos();
      $titulo = trim(filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING));
      $autor = trim(filter_input(INPUT_POST, "autor", FILTER_SANITIZE_STRING));
      $categoria = trim(filter_input(INPUT_POST, "categoria", FILTER_VALIDATE_INT));
      $descricao = trim(filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_STRING));

      //recebe dados de arquivo da requisição($_FILES)
      if(isset($_FILES["foto"]) and !empty($_FILES["foto"]["tmp_name"]))
      {
        $arquivo = $_FILES["foto"];
        $validos = array("image/jpg","image/jpeg","image/png");
        if(in_array($arquivo["type"], $validos))
        {
          //hash nome arquivo
          $nome_arquivo = md5(time()).".jpg";
          move_uploaded_file($arquivo["tmp_name"], "../Public/Assets/images/galeria/".$nome_arquivo);

          $foto->salvarFoto($titulo, $autor, $nome_arquivo, $categoria, $descricao);
          echo "<script>window.alert('Foto adicionada com sucesso')</script>";
          echo "<script>window.history.back()</script>";
          return true;
        }
        else
        {
          echo "<script>window.alert('Arquivo selecionado invalido')</script>";
          echo "<script>window.history.back()</script>";
          return false;
        }
      }
    }
  }
?>
