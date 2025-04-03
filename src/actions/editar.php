<?php
  include_once '../conexao.php';

  $cargos = $conexao->query("SELECT * FROM usuario_cargo");

  $id = $_REQUEST['id'];
  $nome = $_REQUEST['nome'] ?: NULL;
  $email = $_REQUEST['email'] ?: NULL;
  $senha = $_REQUEST['senha'] ?: NULL;
  $cargo = $_REQUEST['cargo'] ?: NULL;

  
  $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, cargo = :cargo WHERE id = :id";
  $statement = $conexao->prepare($sql);
  $statement->bindParam(':nome',$nome);
  $statement->bindParam(':email',$email);
  $statement->bindParam(':senha',$senha);
  $statement->bindParam(':cargo',$cargo);
  $statement->bindParam(':id',$id);

  $statement->execute();

  header('Location: ../../index.php');
  
?>

