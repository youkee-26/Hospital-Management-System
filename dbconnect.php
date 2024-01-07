<?php

$server = "localhost";
$username = "root";
$password = "";

$database = 'ashathehope';

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("failure ".mysqli_connect_error());
  }
?>

