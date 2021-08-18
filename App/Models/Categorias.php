<?php
  /*
  * class Model(Categorias) contendo metodos procedimentos realizando requisições a banco
  * de dados tratando regras de negocios e acesso aos dados perante a aplicação
  */
  namespace App\Models;

  use App\Core\Model;

  class Categorias extends Model
  {
    private function verificaCategoria($nome_categoria)
    {
      $query = "SELECT * FROM categorias WHERE nome = :nome";
      $query = $this->pdo->prepare($query);
      $query->bindValue(":nome", $nome_categoria);
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

    public function salvarCategoria($nome_categoria)
    {
      if($this->verificaCategoria($nome_categoria) == true)
      {
        $query = "INSERT INTO categorias (nome) VALUES (:nome)";
        $query = $this->pdo->prepare($query);
        $query->bindValue(":nome", $nome_categoria);
        $query->execute();
        return true;
      }
    }

    public function getCategoriasAll()
    {
      $query = "SELECT * FROM categorias ORDER BY nome ASC";
      $query = $this->pdo->query($query);
      if($query->rowCount() > 0)
      {
        $categorias = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $categorias;
      }
      else
      {
        return array();
      }
    }
  }
?>
