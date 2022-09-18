<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>

<body>
    <!-- Navbar  -->
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->

    <!-- Login form -->
    <div class="card align-middle " style="margin: 5rem; background: #f8f9fa">
        <div class="card-body d-flex justify-content-center">
            <form action="login.php" method="post">
                <div class="row">
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                        <button type="submit" name="submit" class="btn btn-danger my-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center p-3"><a href="registration.php" style="text-decoration: none; color: black;">
            Don't have an account?</a></div>
        
    </div>
    <!-- end of login form -->

    <!-- php code to handle login process -->
    <?php
    // include database connection file    
    include_once 'dbConfig.php';
    // check if the form is submitted
    if (isset($_POST['submit'])) {
        // get the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        // check if the username and password are correct
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = $result->fetch_assoc()){
                // display the job in one row
                echo '
                    <div class="col-md-4">
                        <div class="card m-2 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Job Type: '.$row['company'].'</h5>
                            </div>
                        </div>
                    </div>';
                    $_SESSION['company'] = $row['company'];

            }
            //   set session variables
            $_SESSION['username'] = $username;
            // login successful
            header('Location: findJob.php');
        } else {
            // login failed
            echo 'Incorrect username or password';
        }
    }
    ?>
 <!-- start of footer -->
 <!-- PHP code to import the header/navbar -->
 <?php
    include_once 'footer.php'; 
 ?>   
<!-- end of footer -->
</body>

</html>