<?php
  /*
  * class adicionarcategoriaController contendo metodos(actions) sendo responsavel
  * por obter controle á adições de categorias(view)
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Categorias;
  use Dompdf\Dompdf;
  use Dompdf\Options;

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

    public function relatorio()
    {
      $categoria = new Categorias();
      $data = new \DateTime();
      $dadosModel = array(
        "categorias" => $categoria->getCategoriasAll(),
        "data_atual" => $data->format("d/m/Y")
      );
      /* Inícia procedimento de gravar o codigo na memoria */
      ob_start();
      $this->loadView("relatorio_categorias", $dadosModel);
      $html = ob_get_contents();
      ob_end_clean();
      $options = new Options();
      $options->setDefaultFont("Sans-Serif");
      $options->setChroot(__DIR__);
      $options->setIsRemoteEnabled(TRUE);
      $options->setFontHeightRatio(1);

      $dompdf = new Dompdf($options); //agregação de objeto(injeção de dependencia)
      $dompdf->loadHtml($html);
      $dompdf->setPaper("A4", "portrat");
      $dompdf->render();
      $dompdf->stream("relatorio_categorias.php");
      return true;
    }
  }
?>
