<?php
  session_start();

  include 'conexao.php';
  $id = $_GET['id'];
  $obj = new banco();
  $sql = "DELETE FROM tweets WHERE id = '$id'";
  $obj->insert($sql);
  echo ($_SESSION['mensagercio_deletado'] = "Deletado com sucesso!");
  header("location: ../inicio.php");

?>
