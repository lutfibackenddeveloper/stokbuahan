<?php
$hostname ="localhost";
$user ="root";
$password = "";
$database = "project";

$db=mysqli_connect($hostname,$user,$password,$database);
if(!$db){
    die("koneksi database gagal".mysqli_connect_error());
}


