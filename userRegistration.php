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


//create registration form that saves data to the database
echo '<form action="userRegistration.php" method="post">';
echo '<input type="text" name="username" placeholder="Username" />';
echo '<input type="text" name="address" placeholder="Address" />';
echo '<input type="number" name="age" placeholder="Age" />';
echo '<input type="password" name="password" placeholder="Password" />';
echo '<input type="submit" name="submit" value="Register" />';
echo '</form>';

//store form data in the database
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users (username, address, age, password) VALUES ('$username', '$address', '$age', '$password')";
    $result = mysqli_query($db, $sql);
    if($result){
        echo 'You have successfully registered!';
    }
    else{
        echo 'You have not successfully registered!';
    }
}
?>