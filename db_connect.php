<?php 
$server = "localhost";
$username = "root";
$password = "Donjet123@";
$db = "web";


$conn = new mysqli($server,$username,$password,$db);

if($conn->connect_error){
    die("Lidhja deshtoi".$conn->connect_error);
}

?>