<?php 
//connect to database
//create variables for the database connection
$host = 'localhost';
$database = 'teachers-recruitment';
$user = 'root';
$password = '';

//create a connection to the database
$db = mysqli_connect($host, $user, $password, $database);
//check if the connection failed
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
}
else{
    echo 'Database connection successful!';
}



//create a form for user to enter their username and password
echo '<form action="userLogin.php" method="post">';
echo '<input type="text" name="username" placeholder="Username" />';
echo '<input type="password" name="password" placeholder="Password" />';
echo '<input type="submit" name="submit" value="Login" />';
echo '</form>';

//check if the user exists in the database
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        //navigate to the displayUsers.php page
        header('Location: displayUsers.php');
        echo 'You have successfully logged in!';
    }
    else{
        echo 'You have not successfully logged in!';
    }
}
?>