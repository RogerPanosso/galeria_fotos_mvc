<?php
  /*
  * class Controller(Base Auxiliar) sendo responsavel por realizar as devidas requisições
  * para usuário final. Sendo a classe Controller(Base) herdada em seus controllers de acessos
  * por usuários
  */
  namespace App\Core;

  class controller
  {
    protected array $dados;

    public function __construct()
    {
      $this->dados = array();
    }

    public function loadTemplate(string $nomeView, array $dadosModel = array())
    {
      $this->dados = $dadosModel;
      require "../App/Config/Config.php";
      require "../App/Views/Parcial/template.php";
    }

    public function loadViewInTemplate(string $nomeView, array $dadosModel = array())
    {
      extract($this->dados); //ou extract($dadosModel);
      require "../App/Views/Pages/".$nomeView.".php";
    }

    public function loadView(string $nomeView, array $dadosModel = array())
    {
      extract($this->dados); //ou extract($dadosModel);
      require "../App/Views/Pages/".$nomeView.".php";
    }
  }
?>
