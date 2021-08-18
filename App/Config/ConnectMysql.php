<?php
  /*
  * class ConnectMysql estabelecendo conexão com banco de dados Mysql através de uma composição interna
  * utilizando a class PDO(object) biblioteca utilizado padrão de projeto criacional Singleton
  * contendo instancia unica de objeto(PDO) perante a aplicação sendo disponibilizada como um ponto
  * de acesso global perante a aplicação. Sendo ocorrida a instancia de dentro da propria classe internamente
  */
  namespace App\Config;

  class ConnectMysql
  {
    private static ?\PDO $instancePdo = null;

    private function __construct(){}
    private function __destruct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstancePdo() : \PDO
    {
      if(!isset(self::$instancePdo) and self::$instancePdo === null)
      {
        require "Config.php";
        self::$instancePdo = new \PDO($config["dbdriver"].":dbname=".$config["dbname"].";host=".$config["dbhost"], $config["dbuser"], $config["dbpass"]);
        self::$instancePdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        self::$instancePdo->setAttribute(\PDO::ATTR_ORACLE_NULLS, \PDO::NULL_EMPTY_STRING);
      }
      //caso já exista uma instancia(objeto) PDO criada e armazenada em atributo estático somente retorna
      return self::$instancePdo;
    }
  }
?>
