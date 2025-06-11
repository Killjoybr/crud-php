<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
  $sql = "SELECT * FROM usuario";

  $usuarios = $conexao->query($sql);
  $autenticacao = "SELECT senha, nome FROM usuario where email = :email";

  $statement = $conexao->prepare($autenticacao);
  $statement->bindParam('email', $_REQUEST['email']);
  $statement->execute();
  $usuario = $statement->fetch(PDO::FETCH_ASSOC);
  
  
  if(password_verify($_REQUEST['senha'], $usuario['senha'])){
    session_start();

    $_SESSION['email'] = $_REQUEST['email'];
    $_SESSION['usuario'] = $usuario['nome'];


    header('location: ../tabela.php');
  }

  if ($_REQUEST['senha'] && password_verify($_REQUEST['senha'], $usuario['senha']) == false){
    header('location: ../../index.php?mensagem=Autenticacao malsucedida');
  }
?>
