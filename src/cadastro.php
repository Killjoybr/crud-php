<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
  
  $nome = $_REQUEST['nome'];
  $email = $_REQUEST['email'];
  $senha = $_REQUEST['senha'];
  $telefone = $_REQUEST['telefone'];

  $hash = password_hash($senha, PASSWORD_BCRYPT);

  $sql = "INSERT INTO usuario (nome, email, senha, telefone) VALUES (:nome, :email, :senha, :telefone)";

  $statement = $conexao->prepare($sql);
  $statement->bindParam(':nome',$nome);
  $statement->bindParam(':email',$email);
  $statement->bindParam(':senha',$hash);
  $statement->bindParam(':telefone',$telefone);

  $statement->execute();

  $statement ? header('Location: ../index.php?mensagem=Cadastro efetuado com sucesso!') : header('Location: ../index.php?mensagem=Erro ao cadastrar usuário!'); 
?>
