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
    $sql = "SELECT * FROM job_seekers WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['role'] = $row['role'];
        }
        //   set session variables
        $_SESSION['username'] = $username;
        // login successful
        header('Location: homepage.php');
    } else {
        $employersSql = "SELECT * FROM employers WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $employersSql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['company'] = $row['company'];
                $_SESSION['role'] = $row['role'];
            }
            //   set session variables
            $_SESSION['username'] = $username;
            // login successful
            header('Location: homepage.php');
        }
        // login failed
        else {
            echo '<div class="alert alert-danger" role="alert">
        Login Failed!
      </div>';
        }
    }
}
?>
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
<style>
    .card {
        border-radius: 0;
        box-shadow: 0px 0 14px 0 rgba(0, 0, 0, 0.6);
    }

    .btn-danger {
        border-radius: 0;
    }
</style>

<body>
    <!-- Navbar  -->
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->

    <!-- Login form -->
    <div class="card align-middle " style="margin: 5rem;">
        <div class="card-body d-flex justify-content-center">
            <form class="needs-validation" novalidate action="login.php" method="post">
                <div class="row">
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control " id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                        <div class="invalid-feedback">
                            Please enter a username.
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control " id="validationServer01" value="" required />
                        <div class="invalid-feedback">
                            Please enter a password.
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger my-3">Login</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center p-3"><a href="registration.php" style="text-decoration: none; color: black;">
                Don't have an account?</a>
        </div>
    </div>
    <!-- end of login form -->
    <!-- start of footer -->
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- end of footer -->
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>