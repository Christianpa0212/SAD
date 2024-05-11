<?php

include('db.php');

if (isset($_POST['save_al'])) {
  $Nombre = $_POST['Nombre'];
  $Edad = $_POST['Edad'];
  $query = "INSERT INTO Alumnos(Nombre, Edad) VALUES ('$Nombre', '$Edad')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error");
  }

  $_SESSION['message'] = 'Alumno agregado satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}