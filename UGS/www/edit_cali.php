<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "SELECT * FROM Calificaciones WHERE ID = $ID";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Materia = $row['Materia'];
    $Calificacion = $row['Calificacion'];
  }
}

if (isset($_POST['Actualizar'])) {
  $ID = $_GET['ID'];
  $Materia = $_POST['Materia'];
  $Calificacion = $_POST['Calificacion'];

  $query = "UPDATE Calificaciones set Materia = '$Materia', Calificacion = '$Calificacion' WHERE ID = $ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Becado actualizado satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: calificaciones.php');
}


?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_cali.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <div class="form-group">
          <input name="Materia" type="text" class="form-control" value="<?php echo $Materia; ?>" placeholder="Actualizar Materia">
        </div>
        <div class="form-group">
          <input name="Calificacion" type="number" class="form-control" value="<?php echo $Monto; ?>" placeholder="Actualizar Calificacion">
        </div>
        <button class="btn btn-success" name="Actualizar">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

