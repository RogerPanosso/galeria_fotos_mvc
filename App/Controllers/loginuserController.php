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

    public function esqueciSenha()
    {
      $usuario = new Usuarios();
      $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
      $nova_senha = trim(filter_input(INPUT_POST, "nova_senha", FILTER_SANITIZE_STRING));
      if($email == true and $nova_senha == true)
      {
        $hash_nova_senha = password_hash($nova_senha, PASSWORD_DEFAULT);
        $usuario->updateSenha($email, $hash_nova_senha);
        echo "<script>window.alert('Senha atualizada com sucesso !!')</script>";
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
