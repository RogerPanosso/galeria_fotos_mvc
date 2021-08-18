<?php
  /*
  * class Model(Usuarios) contendo metodos procedimentos realizando requisições a banco
  * de dados tratando regras de negocios e acesso aos dados perante a aplicação
  */
  namespace App\Models;

  use App\Core\Model;

  class Usuarios extends Model
  {
    private function verificaCadastro($email)
    {
      $query = "SELECT * FROM usuarios WHERE email = :email and ativo = :ativo";
      $query = $this->pdo->prepare($query);
      $query->bindValue(":email", $email);
      $query->bindValue(":ativo", 1);
      $query->execute();
      if($query->rowCount() === 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function salvarCadastro($nome, $email, $senha)
    {
      if($this->verificaCadastro($email) == true)
      {
        $query = "INSERT INTO usuarios (nome,email,senha) VALUES (:nome,:email,:senha)";
        $query = $this->pdo->prepare($query);
        $query->bindValue(":nome", $nome);
        $query->bindValue(":email", $email);
        $query->bindValue(":senha", $senha);
        $query->execute();
        $id_user = $this->pdo->lastInsertId();
        $hash_id_user = md5($id_user);
        $link_confirm = "http://localhost/phpb7web/php1/confirmcadastrouser/confirm/";
        //envio mail
        $para = $email;
        $assunto = "Confirmação de Cadastro";
        $mensagem = "Olá ".$nome. " seja muito bem vindo(a). Segue abaixo seus dados atuais perante seu cadastro:"."\r\n"."
        Nome: ".$nome."\r\n"."E-Mail: ".$email."\r\n"."Senha: ".$senha."\r\n"."\r\n"."Acesse o link disponibilizado
        realizando a confirmação de seu cadastro para realizar seu login: ".$link_confirm;
        $headers = "From: rogerninopa@gmail.com"."\r\n"."Reply-To: ".$email."\r\n"."X-Mailer: PHP/".phpversion();
        mail($para, $assunto, $mensagem, $headers);
        return true;
      }
    }

    private function getHashSenha($email)
    {
      $query = "SELECT senha FROM usuarios WHERE email = :email and ativo = :ativo";
      $query = $this->pdo->prepare($query);
      $query->bindValue(":email", $email);
      $query->bindValue(":ativo", 1);
      $query->execute();
      if($query->rowCount() > 0)
      {
        $senha = $query->fetch(\PDO::FETCH_ASSOC);
        return $senha["senha"];
      }
    }

    public function login($email, $senha)
    {
      $query = "SELECT * FROM usuarios WHERE email = :email and senha = :senha and ativo = :ativo";
      $query = $this->pdo->prepare($query);
      $query->bindValue(":email", $email);
      $query->bindValue(":senha", $this->getHashSenha($email));
      $query->bindValue(":ativo", 1);
      $query->execute();
      if(password_verify($senha, $this->getHashSenha($email)))
      {
        if($query->rowCount() > 0)
        {
          $dados_login = $query->fetch(\PDO::FETCH_ASSOC);
          $_SESSION["login"] = $dados_login;
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
    }
  }
?>
