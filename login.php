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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="./images/eduhirelogo.png" width="45" height="43"
                    alt="logo" />
                NamEduHire</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="findJob.php">Find a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jobPost.php">Post a Job</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn0"><a href="login.php"
                            style="text-decoration: none; color: black;">Login</a></button>
                    <button class="btn1"><a href="registration.php" style="text-decoration: none; color: black;">Sign
                            Up</a></button>
                </form>
                </form>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- Login form -->
    <div class="card align-middle" style="margin: 5rem; background: #f8f9fa">
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
                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
            </form>
        </div>
    </div>
    <!-- end of login form -->

    <!-- php code to handle login process -->
    <?php
      // include database connection file    
      // connect to the database
      $conn = mysqli_connect('localhost', 'root', '', 'teachers-recruitment');
      // check connection
      if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
      }
      // check if the form is submitted
      if (isset($_POST['submit'])) {
        // get the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        // check if the username and password are correct
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // login successful
          header('Location: findJob.php');
        } else {
          // login failed
          echo 'Incorrect username or password';
        }
      }
    ?>

</body>

</html>