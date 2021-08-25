<?php
  /*
  * Arquivo de Config(configurações) estabelecendo dados de configurações em array para conexão
  * a banco de dados de acordo com ambiente de desenvolvimento estabelecido e utilizado
  */
  require_once "Environment.php";

  $config = array();

  if(ENVIRONMENT == "development") {
    $config["dbdriver"] = "mysql";
    $config["dbname"] = "projeto_galeria_fotos";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
  }else {
    /* valores relacionados ao servidor externo */
    $config["dbdriver"] = "mysql";
    $config["dbname"] = "projeto_galeria_fotos";
    $config["dbhost"] = "localhost";
    $config["dbuser"] = "root";
    $config["dbpass"] = "";
  }
?>
