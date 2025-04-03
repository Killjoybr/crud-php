<?php
  error_reporting(E_ALL ^ E_WARNING);
  include_once 'conexao.php';

  $cargos = $conexao->query("SELECT * FROM usuario_cargo");

  $id = $_REQUEST['id'];
  $nome = $_REQUEST['nome'] ?: NULL;
  $email = $_REQUEST['email'] ?: NULL;
  $senha = $_REQUEST['senha'] ?: NULL;
  $cargo = $_REQUEST['cargo'] ?: NULL;

  
  if ($id && $nome && $email && $senha && $cargo) {
    $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, cargo = :cargo WHERE id = :id";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':nome',$nome);
    $statement->bindParam(':email',$email);
    $statement->bindParam(':senha',$senha);
    $statement->bindParam(':cargo',$cargo);
    $statement->bindParam(':id',$id);

    $statement->execute();

    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
  </head>
  <body>
<form method="post" action="editar.php?id=<?php echo $id?>">
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
