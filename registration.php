<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style.css" />
    <title>Registration</title>
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
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- Start of the form  -->
    <div class="card align-middle" style="margin: 5rem; background: #f8f9fa">
        <div class="card-body d-flex justify-content-center">
            <!-- action="registration.php" is where the form will submit the data when the button is clicked -->
            <!-- method="post" send the form data-->
            <form class="row g-3" action="registration.php" method="post">
                <div class="col-md-6">
                    <label for="validationServerUsername" class="form-label">Username</label>
                    <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        <input type="text" name="username" class="form-control " id="validationServerUsername"
                            aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                        <!-- <div
                id="validationServerUsernameFeedback"
                class="invalid-feedback"
              >
                Please choose a username.
              </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control " id="validationServer01" value=""
                        required />
                </div>
                <div class="col-md-6">
                    <label for="validationServer02" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control " id="validationServer02" value="" required />
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="col-md-6">
                    <label for="validationServerUsername" class="form-label">Age</label>
                    <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend3">#</span>
                        <input type="number" name="age" class="form-control " id="validationServerUsername"
                            aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
                </div>
            </form>

        </div>
        <div class='d-flex justify-content-center'>
            <!-- php code to save the data to the database -->
            <?php
            //connect to the teachers-recruitment database 
            $conn = mysqli_connect('localhost', 'root', '', 'teachers-recruitment');

            //check if the connection was successful
            if(!$conn){
              echo 'Connection error: ' . mysqli_connect_error();
            }
            
            //check if the form was submitted
            //submit is the name of the button in the form
            if(isset($_POST['submit'])){
              //get the data from the form
              $username = $_POST['username'];
              $password = $_POST['password'];
              $address = $_POST['address'];
              $age = $_POST['age'];
              //write the sql query
              $sql = "INSERT INTO `users`(`username`, `password`, `address`, `age`) VALUES ('$username', '$password', '$address', '$age')";
              //save the data to the database
              if(mysqli_query($conn, $sql)){
                echo 'Registration Successful <br/>';
                echo 'Proceed to Login <br/>';
              } else {
                //error
                echo 'query error: ' . mysqli_error($conn);
              }
            }
          ?>
        </div>
    </div>
    <!-- End of Form -->



</body>

</html>