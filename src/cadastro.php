<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
  
  $nome = $_REQUEST['nome'];
  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];

  $hash = password_hash($senha, PASSWORD_BCRYPT);

  $sql = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";

  $statement = $conexao->prepare($sql);
  $statement->bindParam(':nome',$nome);
  $statement->bindParam(':email',$email);
  $statement->bindParam(':senha',$hash);

  $statement->execute();

  header('Location: ../index.php?message=Cadastro efetuado com sucesso!');
?>
