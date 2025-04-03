<?php
  error_reporting(E_ALL ^ E_WARNING);
  require_once("conexao.php");
  $sql = "SELECT * FROM usuario";

  $usuarios = $conexao->query($sql);
  $autenticacao = "SELECT senha FROM usuario where email = :email";

  $statement = $conexao->prepare($autenticacao);
  $statement->bindParam('email', $_REQUEST['email']);
  $statement->execute();
  $usuario = $statement->fetch(PDO::FETCH_ASSOC);
  
  
  if(password_verify($_REQUEST['senha'], $usuario['senha'])){
    echo "<script type='javascript'>alert('Autenticacao efetuada com sucesso!');";
  }

  if ($_REQUEST['senha'] && password_verify($_REQUEST['senha'], $usuario['senha']) == false){
    echo "<script>alert('Autenticacao Malsucedida!');</script>";
  }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYSQL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
  <form action="autenticacao.php" method="POST">
      <input type="email" required name="email" placeholder="E-mail">
      <input type="password" required name="senha" placeholder="Senha">
      <input type="submit">
  </form>
</body>
</html>
