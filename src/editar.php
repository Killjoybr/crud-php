<?php
  include_once './conexao.php';
  
  $id = $_REQUEST['id'];

  $cargos = $conexao->query("SELECT * FROM usuario_cargo");

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
  </head>
  <body>
<form method="post" action="./actions/editar.php?id=<?php echo $id?>">
      <h2>Atualização de Cadastro</h2>
      <input type="text" placeholder="Nome" name="nome" required>
      <br><br>
      <input type="email" placeholder="jão@email.com" name="email" required>
      <br><br>
      <input type="password" placeholder="senha" name="senha" required>
      <br><br>
      <select name="cargo">
        <option></option>
        <?php  foreach ($cargos as $cargo): ?>
        <option label=<?= $cargo['Descricao'] ?>></option>
            <?= $cargo['id'] ?>
          </option>
        <?php endforeach; ?>
      </select>
      <input type="submit" value="Atualizar" name="atualizar">
    </form>
  </body>
</html>
