<?php
include('../config/config.php');
include('data.php');

if (isset($_POST) && !empty($_POST)){
  
  $data= new recetas(); 


  $save = $data-> save($_POST); 
  if($save){
    $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
  }else{
    $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<?php 
      if (isset($mensaje)){
        echo $mensaje;
      }
?>
<!-- LIMPIEZA DEL FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombres" id="nombres"   class="form-control" >
    
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Correo</label>
    <input type="email" name="correo" id="correo"  class="form-control" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Celular</label>
    <input type="text" name="celular" id="celular" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha y hora de la visita</label>
    <input type="datetime-local" name="fecha" id="fecha" class="form-control" >
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">dirección de la visita</label>
    <input type="text" name="direccion" id="direccion" class="form-control">
  </div>
  <div class="col-md-6">
    <label for="inputAddress" class="form-label">Detalles de la vista</label>
    <input type="text" name="detalles" id="detalles" class="form-control" placeholder="Tomar medidas, Instalación, Garantia">
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Solicictar visita</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>