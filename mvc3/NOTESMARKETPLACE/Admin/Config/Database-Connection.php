<?php


$servername = "localhost";
$username = "root";
$password = "";
$databasename = "notesmarketplace";

$connection = mysqli_connect($servername,$username,$password,$databasename);

if(!$connection){
    die("Connection Fails" . mysqli_connect_error($connection));
}

?>