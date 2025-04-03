<?php
  require_once 'conexao.php';
  
  $usuario = $_REQUEST['nome'];
  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];
  $cargo = $_REQUEST['cargo'] ? $_REQUEST['cargo'] : NULL;
  
  $hash = password_hash($senha, PASSWORD_BCRYPT);

  $sql = "INSERT INTO usuario (nome, email, senha, cargo) VALUES (:usuario, :email, :senha, :cargo)";

  $statement = $conexao->prepare($sql);
  $statement->bindParam(':usuario',$usuario);
  $statement->bindParam(':email',$email);
  $statement->bindParam(':senha',$hash);
  $statement->bindParam(':cargo',$cargo);

  $statement->execute();

  header('Location: index.php');
?>
