<?php
include('db.php');

if (isset($_POST['save_cali'])) {
    $ID_Alumno = $_POST['ID_Alumno'];
    $Materia = $_POST['Materia'];
    $Calificacion = $_POST['Calificacion'];
    $query = "INSERT INTO Calificaciones(ID_Alumno, Materia, Calificacion) VALUES ('$ID_Alumno','$Materia', '$Calificacion')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Becado agregado satisfactoriamente';
    $_SESSION['message_type'] = 'success';
    header('Location: calificaciones.php');
}
?>