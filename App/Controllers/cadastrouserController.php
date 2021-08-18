<?php
  /*
  * class cadastrouserController contendo metodos(actions) sendo responsavel por obter controle
  * á página de cadastro de usuário sobre sua view
  */
  namespace App\Controllers;

  use App\Core\Controller;
  use App\Models\Usuarios;

  class cadastrouserController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $this->loadTemplate("cadastro_user");
    }

    public function salvarCadastro()
    {
      $usuario = new Usuarios();
      //dados da requisição "form" POST
      $nome = trim(filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING));
      $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
      $senha = trim(filter_input(INPUT_POST, "senha", FILTER_SANITIZE_STRING));
      $confirmsenha = trim(filter_input(INPUT_POST, "confirm_senha", FILTER_SANITIZE_STRING));

      if($confirmsenha == $senha)
      {
        $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
        if($usuario->salvarCadastro($nome, $email, $hash_senha,) == true)
        {
          echo "<script>window.alert('Cadastro realizado com sucesso. Acesse seu e-mail e realize sua confirmação')</script>";
          echo "<script>window.history.back()</script>";
        }
        else
        {
          echo "<script>window.alert('Cadastro não realizado. Usuário já existente e ativo')</script>";
          echo "<script>window.history.back()</script>";
          return false;
        }
      }
      else
      {
        header("Location: ../");
        return false;
      }
    }
  }
?>
