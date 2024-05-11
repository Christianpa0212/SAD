<?php

include("db.php");

if(isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "DELETE FROM Calificaciones WHERE ID = $ID";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Calificacion eliminada satisfactoriamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: calificaciones.php');
}

?>