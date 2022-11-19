
<!-- The dbConfig.php file allows us to create a single file that connects to the MYSQL 
database once and import it where ever it is needed thoughout he project -->

<?php
ob_start();
session_start();
//connect to database
//create variables for the database connection
// $host is the servername to connect to
// $user is the username to connect to the database
// $password is the password to connect to the database
// $database is the name of the database
$host = 'localhost';
$database = 'teachers_recruitment';
$user = 'root';
$password = '';

//create a connection to the database
$db = mysqli_connect($host, $user, $password, $database);

//check if the connection was successful
if(!$db){
    die('Connection failed: ' . mysqli_connect_error());
}

?>