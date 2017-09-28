<?php
//connection to database
$servername = "localhost";
$username = "root";
$db="demo";
$password = "";

$conn = new mysqli($servername,$username,$password,$db);

if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}


?>