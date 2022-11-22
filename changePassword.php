<!-- php code to handle login process -->
<?php
$message = ''; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<style>
    body {
        background-color: darkorange;
    }

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
    <div class="d-flex justify-content-center pb-5">
        <div class="card align-middle " style="width: 50%;">
            <?php
            // include database connection file    
            include_once 'dbConfig.php';
            // check if the form is submitted
            if (isset($_POST['submit'])) {
                // get the form data
                $username = $_POST['username'];
                $phone_number = $_POST['phone_number'];
                // check if the username and password are correct
                $sql = "SELECT * FROM users WHERE username = '$username' AND phone_number = '$phone_number'";
                $result = mysqli_query($db, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['status'] == 'blocked') {
                            $message = 'Blocked account. Contact the administrator...'; ?>
                            <?php
                        }
                        if ($row['role'] == 'Employer') {
                            if ($row['status'] == 'pending') {
                                $message = 'The administrator is reviewing your account. Please wait for a while.'; ?>

                            <?php
                            }
                        }
                        if ($row['status'] == 'approved') {
                            $_SESSION['role'] = $row['role'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['company'] = $row['school'];
                            ?>
                            <script>
                                window.location.href = "homepage.php"
                            </script>;
                    <?php
                        }
                    }
                } else {
                    ?>
                    <!-- alert should disappear after 3 seconds -->
                    <div class="alert alert-danger text-center" id='alert' role="alert">
                        The username or phone number is incorrect.
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('alert').style.display = 'none';
                        }, 2500);
                    </script>
            <?php }
            }    ?>

            <div class="card-body d-flex justify-content-center">
                <form class="needs-validation" novalidate action="login.php" method="post">
                    <div class="row">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">New password</label>
                            <input type="text" name="username" class="form-control " id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                            <div class="invalid-feedback">
                                Please enter a username.
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="text" name="phone_number" class="form-control " id="validationServer01" value="" required />
                            <div class="invalid-feedback">
                                Please enter a phone number.
                            </div>
                            <button type="submit" name="submit" id="submit" class="btn btn-danger my-3">Proceed to change password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end of login form -->

    <!-- Toast notification to welcome the user -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./images/eduhirelogo.png" class="rounded me-2" alt="..." style="height: 20px; width: 20px;">
                <strong class="me-auto">NamEduJobs</strong>
                <small><?php
                        echo date("h:i:sa");
                        ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                echo $message
                ?>
            </div>
        </div>
    </div>
    <!-- start of footer -->

    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- Bootstrap 5 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <!-- end of footer -->
    <?php
    if (isset($_POST['submit'])) {
        if ($result) {
            echo '<script>  
            const toastLiveExample = document.getElementById("liveToast")          
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        </script>';
        } else {
            echo '<script>  
        const toastLiveExample = document.getElementById("liveToast")          
        const toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
    </script>';
        }
    }
    ?>


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