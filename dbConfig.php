<?php
//connect to database
//create variables for the database connection
$host = 'localhost';
$database = 'test';
$user = 'root';
$password = '';

//create a connection to the database
$db = mysqli_connect($host, $user, $password, $database);

//check if the connection was successful
if(!$db){
    die('Connection failed: ' . mysqli_connect_error());
}

?>