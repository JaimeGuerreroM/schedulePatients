<?php
include('../config/config.php');
include('data.php');
$p = new recetas();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fecha);

if (isset($_POST) && !empty($_POST)){

  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar un paciente </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Visita Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<div class="container" >
<center><h3>Editar visitas porgramadas por clientes</h3></center>
<?php
    if (isset($error)){
      echo $error;
    }
    ?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombres" id="nombres" value="<?= $data->nombres ?>"  class="form-control" >
    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Correo</label>
    <input type="email" name="correo" id="correo" value="<?= $data->correo ?>"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Celular</label>
    <input type="text" name="celular" id="celular" value="<?= $data->celular ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha y hora de la visita</label>
    <input type="datetime" name="fecha" id="fecha" value="<?= $date->format('Y-m-d\TH:i') ?>"class="form-control" >
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Dirección de la visita</label>
    <input type="text" name="direccion" id="direccion" class="form-control">
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Detalles de la visita</label>
    <input type="text" name="detalles" id="detalles" class="form-control">
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Modificar</button>
  </div>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>