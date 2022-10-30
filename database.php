<?php

//CONNECT TO MYSQL DATABASE USING MYSQLI
$servername = "localhost";
$username = "root";
$password = "";
$dbname  = "scrumboard";
// $con = mysqli_connect($servername,$username,$password,$dbname);

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else echo 'Connected';