<?php 
//connect to database
$db = mysqli_connect('localhost', 'root', '', 'teachers-recruitment');

//check if the connection failed
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
}
else{
    echo 'Database connection successful!';
}

//get u in the database and display in a form

//store form data in the database
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $sql = "UPDATE users SET username='$username', address='$address', age='$age', password='$password' WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    if($result){
        echo 'You have successfully edited!';
    }
    else{
        echo 'You have not successfully edited!';
    }
}


?>
