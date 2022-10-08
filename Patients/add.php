<?php
include_once('../config/config.php');
include_once('Patient.php');

if (isset($_POST) && !empty($_POST)){
    $p = new Patient();

if ($_FILES['image']['name'] !==''){
    $_POST['image'] = saveImage($_FILES);
}

$save = $p->save($_POST);
if ($save){
    $mensaje = '<div class="alert alert-success" > Sesion registrada </div>';
}else{
    $mensaje = '<div class="alert alert-danger" > Error l registrar! </div>';
}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8"/>
    <title>Crear paciente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
        ?>
        <h2 class="text-center mb-2"> REGISTRAR UN PACIENTE </h2>
        <form method="POS" enctype="multipar/form-data" >

        <div class="row mb-2">
            <div class="col">
                <input type="text" name="firsName" id="firsName" placeholder="Nombre del paciente" class="form-control" />
            </div>
            <div class="col">
                <input type="text" name="lastName" id="lastName" placeholder="Apellido del paciente" class="form-control" />
            </div>

            <div class="row mb-2">
            <div class="col">
                <input type="email" name="email" id="email" placeholder="Email del paciente" class="form-control"/>
            </div>
        </div>
        
        <div class="row mb-2">
            <div class="col">
                <input type="number" name="phone" id="phone" placeholder="Numero celular del paciente" class="form-control"/>
            </div>
        </div>
        
        <div class="row mb-2">
            <div class="col">
                <textarea name="diseases" id="diseases" placeholder="enfermedad 1, enfermedad 2, ..." class="form-control"></textarea>
                <b> Debe separar la enfermedades con una coma </b>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="datetime-local" name="sessionDate" id="sessionDate" class="form-control" />
            </div>
            <div class="col">
                <input type="text" name="duration" id="duration" placeholder="Duración de la sesión" class="form-control" />
            </div>
        </div>

        <div class="row mb-2">
            <div class="col">
                <input type="file" name="image" id="image" class="form-control" />
            </div>
        </div>

        <button class="btn btn-success" > Registrar</button>
        
        </div>

        </form>


    </div>
    
</body>
</html>