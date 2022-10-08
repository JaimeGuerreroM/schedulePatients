<?php
 include_once('../config/config.php');
 include_once('../config/Database.php');

 class Patient{
    public $conn;
    
    function _construct()
    {
        $db = new Database();
        $this->conn = $db->connectToDatabase();
    }

    function save($params){
        $firsName = $params['firsName'];
        $lastName = $params['lastName'];
        $email = $params['email'];
        $phone = $params['phone'];
        $diseases = $params['diseases'];
        $sessionDate = $params['sessionDate'];
        $duration = $params['duration'];
        $image = $params['image'];

        $inset = " INSERT INTO schedulepatients VALUES(NULL, '$firsName','$lastName' '$email', $phone, '$diseases', '$sessionDate', '$duration', '$image')";
        return mysqli_query($this->conn, $inset);
    }

    function getAll(){
        $sql = " SELECT * FROM Patients";
        return mysqli_query($this->conn, $sql);
    }

    function getOne($id){
        $sql = "SELECT * FROM Patients WHERE id = $id";
        return mysql_query($this->conn, $sql);
    }

    function update($params){
        $firsName = $params['firsName'];
        $lastName = $params['lastName'];
        $email = $params['email'];
        $phone = $params['phone'];
        $diseases = $params['diseases'];
        $sessionDate = $params['sessionDate'];
        $duration = $params['duration'];
        $image = $params['image'];
        $id = $params['id'];

        $update = " UPDATE Patients SET firtName='$firsName', lastName='$lastName', email='$email', phone='$phone', diseases='$diseases', sessionDate='$sessionDate', duration='$duration', image='$image' WHERE id = $id";
        return myqli_query($this->conn, $update);
    }

    function remove($id){
        $remove = "DELETE FROM Partients WHERE id = $id";
        return mysqli_query($this->conn, $remove);
    }
 }
?>