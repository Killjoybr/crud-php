<?php
    // while ($row = $usuarios->fetch(PDO::FETCH_OBJ)) {
    //     echo '
    //         <tr>
    //             <td>TESTE</td>
    //             <td>TESTE</td>
    //             <td>TESTE</td>
    //             <td>TESTE</td>
    //         </tr>
    //     ';
    // };
 
    // include("conexao.php");
    include_once("conexao.php");

    $getUsers = "SELECT * FROM usuario";
    $getCargos = "SELECT * FROM usuario_cargo";

    $usuarios = $conexao->query($getUsers);
    $cargos = $conexao->query($getCargos);
    $cargosArr = []; 

    foreach ($cargos as $cargo){
      $cargosArr[] = $cargo['Descricao'];
    }

    $cargosCombo = $conexao->query($getCargos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.min.css"> -->
  </head>
    <body>
      <a href="autenticacao.php">Login</a>
      <table>
        <caption><h1>Tabela de Usuarios<strong></caption>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Senha</th>
            <th>Cargo</th>
            <th>Ações</th>
          </tr>
        </thead>
        <?php  foreach ($usuarios as $usuario):?>
          <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['senha'] ?></td>
            <td><?= empty($cargosArr[$usuario['cargo'] - 1]) ? NULL : $cargosArr[$usuario['cargo'] - 1] ?></td>
            <td>
              <a href="excluir.php?id=<?= $usuario['id'] ?>"> <i class="fa fa-trash"></i> </a>
              <a href="editar.php?id=<?= $usuario['id'] ?>"> <i class="fa fa-pencil"></i> </a>
            </td>                   
          </tr>
        <?php endforeach; ?>
      </table>
      <form method="post" action="cadastro.php">
      <h2>Cadastro de Usuário</h2>
      <input type="text" placeholder="Jõaozinho da Goiaba" name="nome" required>
      <br><br>
      <input type="email" placeholder="jão@email.com" name="email" required>
      <br><br>
      <input type="password" placeholder="senha" name="senha" required>
      <br><br>
        <select name="cargo">
          <option></option>
          <?php  foreach ($cargosCombo as $cargo): ?>
          <option label=<?= $cargo['Descricao'] ?>><?= $cargo['id'] ?></option>
          <?php endforeach; ?>
          </select>
        <br><br>
        <input type="submit" value="Cadastrar" name="cadastrar">
      </form>
    </body>
</html>
