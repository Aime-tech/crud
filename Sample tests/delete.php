<?php
  session_start();
  include "connection.php";

  $id = $_GET['id'];

  $sql = "DELETE FROM user WHERE id = $id";

  $result = $conn->query($sql);

  $conn->close();

  $_SESSION['msg'] = 'Data Deleted Successfully';
  header("location:index.php");
?>