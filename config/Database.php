<?php


class Database{
    public $host = 'localhost';
    public $user = 'root'; 
    public $pass = '';  
    public $db = 'consultoriopsico'; 
    private $conexion; 
    function __construct(){
        $this->conexion = $this->connectToDatabase(); 
        return $this -> conexion; 
    }

    function connectToDatabase(){
        $conexion= mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if(mysqli_connect_error()){ 
            echo "Tenemos un error de conexion " . mysqli_connect_error();
        }
        return $conexion; 
    }
}





?>