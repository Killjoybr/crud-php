<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/projects/crud-php/config/conexao.php');
  
  $id = $_REQUEST['id'];

  $sql = "DELETE from usuario where id = :id";

  $statement = $conexao->prepare($sql);
  $statement->bindParam(':id',$id);

  $statement->execute();

  header('Location: ' . '/projects/crud-php/src/tabela.php');
?>
