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


    //query to select all users from the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($db, $sql);
    //display the results in a table
    if(mysqli_num_rows($result) > 0){

        echo '<table border="1" style={}>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Username</th>';
        echo '<th>Address</th>';
        echo '<th>Age</th>';
        echo '<th>Password</th>';
        echo '</tr>';
        //keep getting the next row until there are no more rows
        while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['username'].'</td>';
            echo '<td>'.$row['address'].'</td>';
            echo '<td>'.$row['age'].'</td>';
            echo '<td>'.$row['password'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    else{
        echo 'No users found';
    }
}

//display form containing all the users in the database
// echo '<form action="displayUsers.php" method="post">';
// echo '<input type="submit" name="submit" value="Display Users" />';
// echo '</form>';



?>