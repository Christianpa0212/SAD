<?php

include("db.php");

if(isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "DELETE FROM Becados WHERE ID = $ID";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Becado eliminado satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: becados.php');
}

?>