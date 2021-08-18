<?php
  /*
  * class Core(auxiliar) sendo responsavel por iniciar e dar funcionamento a estrutura MVC
  * e estruturando também URL amigavel para obter acesso a requisições realizadas por usuário
  * final como Controller/metodos(actions)/parametros após dominio da aplicação.
  */
  namespace App\Core;

  class Core
  {
    public function __construct()
    {
      $this->run();
    }

    public function run()
    {
      if(isset($_REQUEST["url"]) and !empty($_REQUEST["url"]) and is_string($_REQUEST["url"]))
      {
        $url = $_REQUEST["url"];
      }

      if(!empty($url) and $url != "")
      {
        $url = explode("/", filter_var($url, FILTER_SANITIZE_URL));
        $controller = $url[0]."Controller";
        array_shift($url);

        if(isset($url[0]) and !empty($url[0]) and is_string($url[0]))
        {
          $method = $url[0];
          array_shift($url);
        }
        else
        {
          $method = "index";
        }

        $params = array();
        if(count($url) > 0)
        {
          $params = $url;
        }
      }
      else
      {
        $controller = "homeController";
        $method = "index";
        $params = array();
      }
      
      //define estrutura de namespace(dir) para acesso a controllers requisitados
      $controller = "App\\Controllers\\".$controller;

      //define caminho(dir) da aplicação na qual se encontra controllers a ser requisitados para obter validação de acesso
      $caminho_controller = "galeria_fotos/App/Controllers/".$controller.".php";

      //estabelece validação se controller requisitado e action não sõa existentes perante sua camada na aplicação
      //para obter erro de acesso interno(404) perante a aplicação ao usuário final
      if(!file_exists($caminho_controller) and !method_exists($controller, $method))
      {
        $controller = "App\\Controllers\\notfoundController";
        $method = "index";
        $params = array();
      }

      //realiza instancia do controller requisitado executando sua action com seus devidos parametros caso haja
      $objeto_controller = new $controller();
      call_user_func_array(array($objeto_controller, $method), $params);
    }
  }
?>
