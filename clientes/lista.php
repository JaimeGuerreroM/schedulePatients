<?php
include('../config/config.php'); 
include('data.php'); 

$libro= new recetas(); 
$todosRegistros= $libro->getAll();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $borrar= $libro->delete($_GET['id']);

    if($borrar){ 
        header('Location'. ROOT . 'pacientes/lista.php'); 
    }else{ 
        $mensaje= "<div class='alert-danger' rol='alert'>Error al eleminar el paciente</div>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <?php include('../menu.php'); ?>

    <div class="container">
        <center><h3>Lista de visitas porgramadas por clientes</h3></center>

        <div class="row">
            <?php
            while ($usuarios= mysqli_fetch_object($todosRegistros)){
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>Nombre: $usuarios->nombres  </h5>";
                echo "<p><b>Correo:</b> $usuarios->correo 
                <br>
                <b> Celular: </b>  $usuarios->celular
                </p>";
                echo "<p><b> Dirección del visita: </b>  $usuarios->direccion
                </p>";
                echo "<p><b> Detalles de la visita: </b>  $usuarios->detalles
                </p>";
                echo " <p> <b>Fecha y hora de la visita:</b> ".date("D", strtotime($usuarios->fecha)) . " " . date("d-M-Y H:i", strtotime($usuarios->fecha)). " </p> ";

                echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/clientes/edit.php?id=$usuarios->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/clientes/lista.php?id=$usuarios->id' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";
            }

            ?>

        </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>