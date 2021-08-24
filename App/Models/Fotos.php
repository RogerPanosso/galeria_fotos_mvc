<?php
  /*
  * class Model(Fotos) contendo metodos procedimentos realizando requisições a banco
  * de dados tratando regras de negocios e acesso aos dados perante a aplicação
  */
  namespace App\Models;

  use App\Core\Model;

  class Fotos extends Model {
    private function verificaAddFoto($titulo, $categoria)
    {
      $query = "SELECT * FROM fotos WHERE titulo = :titulo and categoria = :categoria";
      $query = $this->pdo->prepare($query);
      $query->bindValue(":titulo", $titulo);
      $query->bindValue(":categoria", $categoria);
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

    public function salvarFoto($titulo, $autor, $nome_arquivo, $categoria, $descricao)
    {
      if($this->verificaAddFoto($categoria, $titulo) == true)
      {
        $query = "INSERT INTO fotos (titulo,autor,foto,categoria,descricao) VALUES (:titulo,:autor,:nome_arquivo,:categoria,:descricao)";
        $query = $this->pdo->prepare($query);
        $query->bindValue(":titulo", $titulo);
        $query->bindValue(":autor", $autor);
        $query->bindValue(":nome_arquivo", $nome_arquivo);
        $query->bindValue(":categoria", $categoria);
        $query->bindValue(":descricao", $descricao);
        $query->execute();
        return true;
      }
    }

    public function getFotos()
    {
      $query = "SELECT fotos.id, fotos.titulo, fotos.autor, fotos.foto, categorias.nome, fotos.descricao FROM fotos
      INNER JOIN categorias ON categorias.id = fotos.categoria ORDER BY fotos.categoria DESC";
      $query = $this->pdo->query($query);

      if($query->rowCount() > 0)
      {
        $fotos = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $fotos;
      }
      else
      {
        return array();
      }
    }
  }
?>
