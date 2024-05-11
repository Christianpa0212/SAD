<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
    
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="save_bec.php" method="POST">
          <div class="form-group">
            <input type="number" name="ID_Alumno" class="form-control" placeholder="NUA" autofocus>
          </div>
          <div class="form-group">
          <input type="text" name="Beca" class="form-control" placeholder="Beca" autofocus>
          </div>
          <div class="form-group">
          <input type="number" name="Monto" class="form-control" placeholder="Monto" autofocus>
          </div>
          <input type="submit" name="save_bec" class="btn btn-success btn-block" value="Guardar Becado">
        </form>
      </div>
    </div>
   
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NUA</th>
            <th>Beca</th>
            <th>Monto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM Becados";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['ID_Alumno']; ?></td>
            <td><?php echo $row['Beca']; ?></td>
            <td><?php echo $row['Monto']; ?></td>
            <td>
              <a href="edit_bec.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_bec.php?ID=<?php echo $row['ID']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <a href="profesores.php" class="btn btn-secondary">Registrar un profesor</a>
  <a href="calificaciones.php" class="btn btn-secondary">Registrar una calificacion</a>
  <a href="index.php" class="btn btn-secondary">Registrar un alumno</a>
 
</main>

<?php include('includes/footer.php'); ?>

