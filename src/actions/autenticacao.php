<?php
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
    header('location', 'index.php');
  }

  if ($_REQUEST['senha'] && password_verify($_REQUEST['senha'], $usuario['senha']) == false){
    echo "<script>alert('Autenticacao Malsucedida!');</script>";
    header('location', 'index.php');
  }

?>

