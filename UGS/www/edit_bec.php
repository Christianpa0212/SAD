<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  $query = "SELECT * FROM Becados WHERE ID = $ID";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Beca = $row['Beca'];
    $Monto = $row['Monto'];
  }
}

if (isset($_POST['Actualizar'])) {
  $ID = $_GET['ID'];
  $Beca = $_POST['Beca'];
  $Monto = $_POST['Monto'];

  $query = "UPDATE Becados set Beca = '$Beca', Monto = '$Monto' WHERE ID = $ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Becado actualizado satisfactoriamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: becados.php');
}


?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_bec.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <div class="form-group">
          <input name="Beca" type="text" class="form-control" value="<?php echo $Beca; ?>" placeholder="Actualizar Beca">
        </div>
        <div class="form-group">
          <input name="Monto" type="number" class="form-control" value="<?php echo $Monto; ?>" placeholder="Actualizar Monto">
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

