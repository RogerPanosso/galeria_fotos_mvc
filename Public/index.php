<?php
  declare(strict_types=1);

  session_start();

  //require autoload composer
  require "../vendor/autoload.php";

  //referencia namespace(dir) class
  use App\Core\Core;

  //intancia class Core
  $core = new Core();
?>
