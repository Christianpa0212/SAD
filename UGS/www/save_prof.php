<?php

include('db.php');

if (isset($_POST['save_prof'])) {
  $Nombre = $_POST['Nombre'];
  $Sueldo = $_POST['Sueldo'];
  $query = "INSERT INTO Profesores(Nombre, Sueldo) VALUES ('$Nombre', '$Sueldo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error");
  }

  $_SESSION['message'] = 'Profesor agregado satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: profesores.php');

}

