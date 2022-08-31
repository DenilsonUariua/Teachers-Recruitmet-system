<?php 
//connect to database
$db = mysqli_connect('localhost', 'root', '', 'test');
//check if the connection failed
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
}
else{
    echo 'Database connection successful!';
}
?>