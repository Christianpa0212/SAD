<?php
include('db.php');

if (isset($_POST['save_bec'])) {
    $ID_Alumno = $_POST['ID_Alumno'];
    $Beca = $_POST['Beca'];
    $Monto = $_POST['Monto'];
    $query = "INSERT INTO Becados(ID_Alumno, Beca, Monto) VALUES ('$ID_Alumno','$Beca', '$Monto')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $_SESSION['message'] = 'Becado agregado satisfactoriamente';
    $_SESSION['message_type'] = 'success';
    header('Location: becados.php');
}
?>