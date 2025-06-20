<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
  $sql = "SELECT * FROM usuario";

  $usuarios = $conexao->query($sql);
  #$autenticacao = "SELECT senha, nome, tipo FROM usuario where email = :email";

  $autenticacao = "SELECT u.senha, u.nome, u.usuario_tipo, c.descricao 
                   FROM usuario as u 
                   LEFT JOIN usuario_tipo as c ON u.usuario_tipo = c.id 
                   WHERE u.email = :email";

  $statement = $conexao->prepare($autenticacao);
  $statement->bindParam('email', $_REQUEST['email']);
  $statement->execute();
  $usuario = $statement->fetch(PDO::FETCH_ASSOC);
  
  
  if(password_verify($_REQUEST['senha'], $usuario['senha'])){
    session_start();

    $_SESSION['email'] = $_REQUEST['email'];
    $_SESSION['usuario'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['usuario_tipo'];

    $url = match($usuario['tipo']){
      'admin' => '/projects/crud-php/src/views/administrador.php',
      'colaborador' => '/projects/crud-php/src/views/colaborador.php',
      default => '/projects/crud-php/src/views/index.php'
    };

    header("location: $url");
  }

  if ($_REQUEST['senha'] && password_verify($_REQUEST['senha'], $usuario['senha']) == false){
    header('location: ../../index.php?mensagem=Autenticacao malsucedida');
  }
?>
