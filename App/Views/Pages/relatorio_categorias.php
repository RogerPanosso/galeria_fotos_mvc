<title>Categorias Cadastradas.</title>
<div style="width:500px;margin:auto;">
  <img src="http://localhost/galeria_fotos/Public/Assets/images/logo.png" style="margin-bottom:0px;"/>
  <h2>Categorias Cadastradas</h2>
  <p style="font-size:10px;">Relatório gerado por: <?=$_SESSION["login"]["nome"];?> em <?=$data_atual;?></p>
  <p style="font-size:10px;">Usuário: <?=$_SESSION["login"]["email"];?></p>
  <?php if(!empty($categorias)):?>
    <p style="font-size:10px;">Total de Categorias: <?=count($categorias);?></p>
    <table width="400" align="center" border="1" cellpadding="3" cellspacing="3" style="border:1px solid #ccc;">
      <thead style="font-size:10px;background-color:#696969;">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nome</th>
        </tr>
      </thead>
      <tbody style="font-size:10px;">
        <?php foreach($categorias as $categoria): ?>
          <tr>
            <td align="center" style="border:1px solid #ccc;"><?=$categoria["id"];?></td>
            <td align="center" style="border:1px solid #ccc;"><?=$categoria["nome"];?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p style="font-size:10px;">Não há categorias para ser obtidas perante o relatório.</p>
  <?php endif;?>
</div>
