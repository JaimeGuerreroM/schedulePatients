<?php
class Database{
    public $host = 'localhost'; /* Servidor */
    public $user = 'root'; /* Usuario de phpMyAdmin */
    public $pass = ''; /* Constraseña de phpMyAdmin */
    public $db = ' '; /* Base de datos. */
    public $conn;

    function connectToDatabase(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if ( mysqli_connerct_error() ) {
            echo 'Error de conexion'.mysqli_connect_error();
        }

        return $this->conn;
    }
}
?>
