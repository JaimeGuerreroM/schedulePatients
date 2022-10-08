<?php
include_once('../config/config.php');
include_once('Patient.php');
$p = new Patient();
$data = mysqli_fetch_object($p-getOne($_GET['id']));
$data = new DateTime($data->sessionDate);

if (isset($_POST) && !empty($_POST)){
    $_POST['image'] = $data->image;
    if ($_FILES['image']['name'] !== ''){
        $_POST['image'] = saveImage($_FILES);
    }
    $update = $p->update($_POST);
    if ($update){
        $error = '<div class="alert alert-success" role="alert">Paciente modificado correctament</div>';
    }else{
        $error = '<div class="alert alert-danger" role="alert" > Error al modifacar al paciente </div>';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <?php include('../menu.php') ?>
    <div class="container">
        <?php
        if (isset($error)){
            echo $error;
        }
        ?>
        <h2 class="text-center mb-5"> Modificar paciente </h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="firsName" id="firsName" placeholder="Nombre paciente" require class="form-control" value="<?= $date->firsName ?>" />
                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
                </div>
                <div class="col">
                    <input type="text" name="lastName" id="lastName" placeholder="Alellido paciente" requere class="form-control" value="<?= $data->lastName ?>" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="email" name="email" id="email" placeholder="Email paciente" require class="form-control" value="<?= $data->email ?>" />
                </div>
                <div class="col">
                   <input type="number" name="phone" id="phone" placeholder="Numero celurar paciente" require class="form-control" value="<?= $data->phone ?>" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <textarea name="diseases" id="diseases" placeholder="enfermedad 1, enfermedad 2, ..." require class="form-control"><?= $data->diseases ?></textarea>
                    <b> Debes separar las enfemedades con una coma </b>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="datetime-local" name="sessionDate" id="sessionDate" require class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>" />
                </div>
                <div class="col">
                    <input type="text" name="duration" id="duration" placeholder="Duracion de la sesion" require class="form-control" value="<?= $date->duration ?>" />
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input type="file" name="image" id="image" class="form-control" />
                </div>
            </div>

            <button class="btn btn-success"> Modificar </button>
        </form>
    </div>  
</body>

</html>