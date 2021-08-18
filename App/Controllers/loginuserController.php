<?php
  /*
  * class loginuserController contendo metodos(actions) sendo responsavel por obter
  * controle a página de login(view) de usuario
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Usuarios;

  class loginuserController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $this->loadTemplate("login_user");
    }

    public function login()
    {
      $usuario = new Usuarios();
      $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
      $senha = trim(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
      if($usuario->login($email, $senha) == true)
      {
        header("Location: ../../");
        return true;
      }
      else
      {
        echo "<script>window.alert('Login invalido !!')</script>";
        echo "<script>window.history.back()</script>";
        return false;
      }
    }

    public function logout()
    {
      if(isset($_SESSION["login"]) and !empty($_SESSION["login"]))
      {
        unset($_SESSION["login"]);
        header("Location: ../");
        return true;
      }
    }
  }
?>
