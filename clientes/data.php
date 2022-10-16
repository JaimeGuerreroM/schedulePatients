<?php
include('../config/config.php'); 
include('../config/database.php');


class recetas{
    public $conexion; 

    function __construct(){
        $db= new Database(); 
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres= $params['nombres']; 
        $correo= $params['correo'];
        $celular = $params['celular'];
        $fecha = $params['fecha'];
        $direccion = $params['direccion'];
        $detalles = $params['detalles'];
        $insert= "INSERT INTO pacientes VALUES (NULL, '$nombres', '$correo', '$celular', '$fecha', '$direccion', '$detalles')";

        return mysqli_query($this->conexion, $insert);

    }

    function getAll(){
        $basededatos= "SELECT * FROM pacientes"; 
        return mysqli_query($this->conexion, $basededatos);
    }

    function getOne($id){
        $sql = "SELECT * FROM pacientes WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
        $nombres= $params['nombres']; 
        $correo= $params['correo'];
        $celular = $params['celular'];
        $fecha = $params['fecha'];
        $direccion = $params['direccion'];
        $detalles = $params['detalles'];
        $id = $params['id'];
  
        $update = " UPDATE pacientes SET nombres='$nombres', correo='$correo', celular='$celular', fecha='$fecha', direccion='$direccion', detalles='$detalles' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM pacientes WHERE id = $id"; 
        return mysqli_query($this->conexion, $eliminar);
    }

}



?>