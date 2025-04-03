<?php
  require_once 'conexao.php';
  $id = $_REQUEST['id'];
  $sql = "DELETE FROM usuario WHERE id ='$id'";
  $conexao->query($sql);

  header('Location: index.php')
?>
