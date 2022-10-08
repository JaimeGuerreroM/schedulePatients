<?php
include_once('../config/config.php');
include_once('Patient.php');

$p = new Patient();
$data = $p->getAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php include('../menu.php')?>
    <div class="container">
        <h2 class="trxt-center mb-5">Lista pacientes</h2>

        <div class="row">
            <?php
            while ($pt = mysqli_fetch_object($data)) {
                $data = $pt->sessionDate;
                echo "<div class='col' >";
                    echo "<div class="text-center">";
                    echo "<h5> <img src='".ROOT."/images/$pt->image' whith='50' height='50' /> $pt->firsName $pt->lastName</h5>";
                    echo " <p> <b>Fecha:</b>".date("D", strtotime($date)) ."".date('m-y H:i', strtotime($date))."</p>";
                        echo "<div class='text-center'>";
                            echo "<a class='btn btn-success ' href='·#'> Modificar </a>; - <a class='btn btn-danger' href=''> Eliminar </a>;
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>