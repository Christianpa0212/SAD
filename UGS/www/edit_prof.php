<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "SELECT * FROM Profesores WHERE ID = $ID";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Nombre = $row['Nombre'];
    $Sueldo = $row['Sueldo'];
  }
}

if (isset($_POST['Actualizar'])) {
  $ID = $_GET['ID'];
  $Nombre = $_POST['Nombre'];
  $Sueldo = $_POST['Sueldo'];

  $query = "UPDATE Profesores set Nombre = '$Nombre', Sueldo = '$Sueldo' WHERE ID = $ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Profesor actualizado satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: profesores.php');
}


?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_prof.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <div class="form-group">
          <input name="Nombre" type="text" class="form-control" value="<?php echo $Nombre; ?>" placeholder="Actualizar Profesor">
        </div>
        <div class="form-group">
          <input name="Sueldo" type="number" class="form-control" value="<?php echo $Edad; ?>" placeholder="Actualizar Sueldo">
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