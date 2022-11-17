<?php
// include dbConfig
include_once 'dbConfig.php';

//save the data to the database
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $school = $_POST['school'];
    $status = "pending";
    $phone_number = $_POST['phone_number'];


    if ($role == "Employer") {
        // check if the username is unique
        $sql = "SELECT * FROM employers WHERE username = '$username'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
        } else {

            // insert the data into the database
            $sqlEmployer = "INSERT INTO users(username, password, address, role, school, status, phone_number) 
                            VALUES('$username', '$password', '$address', '$role', '$school', '$status', '$phone_number')";
            $sql1 = "INSERT INTO employer_request(username, password, address, school, phone_number) VALUES('$username', '$password', '$address', '$school', '$phone_number')";
            // execute the query
            $db->query($sqlEmployer);
            $db->query($sql1);
            //wait 3 seconds before redirect to the login page
            header("refresh:1;url=login.php");
        }
    } else {
        // check if the username is unique
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
        } else {

            // insert the data into the database
            $sql = "INSERT INTO users(username, password, address, role, school, status, phone_number) 
            VALUES('$username', '$password', '$address', '$role', '$school', '$status', '$phone_number')";
            // execute the query
            $db->query($sql);
            //wait 3 seconds before redirect to the login page
            header("refresh:1;url=login.php");
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
    <link rel="stylesheet" href="./style.css" />
    <title>Registration</title>
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
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->

    <!-- Start of the form  -->
    <div class="card align-middle" style="margin: 5rem;">
        <div class="card-body d-flex justify-content-center">
            <!-- action="registration.php" is where the form will submit the data when the button is clicked -->
            <!-- method="post" send the form data-->
            <form class="row g-3 needs-validation" novalidate action="registration.php" method="post">
                <div class="col-md-6">
                    <label for="validationServerUsername" class="form-label">Username</label>
                    <div class="input-group ">

                        <input type="text" name="username" class="form-control " id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                        <div class="invalid-feedback">
                            Please enter a username.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control " id="password" value="" required />
                    <div class="invalid-feedback" id='password-error'>
                        Please enter a password.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationServer02" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control " id="validationServer02" value="" required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">
                        Please enter an address.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" aria-label="Default select example" name="role" id="role" onchange="disableSchool()" required>
                        <option selected hidden value="">Role</option>
                        <option value="Employer">Employer</option>
                        <option value="Job Seeker">Job Seeker</option>
                    </select>
                    <div class="invalid-feedback">
                        Please choose a user role.
                    </div>
                </div>
                <div class="col-md-6" id="school-field">
                    <label for="validationServer02" class="form-label">School</label>
                    <input type="text" name="school" class="form-control " id="school" value="" required />
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">
                        Please enter a school.
                    </div>
                </div>

                <div class="col-md-6 age-field">
                    <label for="validationServerUsername" class="form-label">Phone number</label>
                    <div class="input-group ">
                        <input type="number" name="phone_number" class="form-control " id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                        <div class="invalid-feedback">
                            Please enter a phone number.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-danger" id="submit" type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End of Form -->
    <div class="p-2"></div>

    <!-- Toast notification to welcome the user -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./images/eduhirelogo.png" class="rounded me-2" alt="..." style="height: 20px; width: 20px;">
                <strong class="me-auto">NamEduHire</strong>
                <small><?php
                        echo date("h:i:sa");
                        ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                // if the username already exists display a toast notification
                if (mysqli_num_rows($result) > 0) {
                    echo 'Username already exists';
                } else {
                    echo 'Registration successful';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <!-- start of footer -->
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        // check if the username is unique
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>
            const toastLiveExample = document.getElementById("liveToast")          
               console.log("show toast");
               const toast = new bootstrap.Toast(toastLiveExample)
               toast.show()
            </script>';
        } else {
            echo '<script>
            const toastTrigger = document.getElementById("submit")
            const toastLiveExample = document.getElementById("liveToast")
            toastTrigger.addEventListener("click", () => {
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        })
            </script>';
        }
    }
    include_once 'footer.php';
    ?>
    <!-- end of footer -->
    <script>
        // if the username already exist change the innerHtml of the error message
        const usernameError = document.querySelector('.username-error');
        const username = document.querySelector('#validationServerUsername');
        username.addEventListener('input', () => {
            if (username.value.length > 0) {
                usernameError.innerHTML = 'Username already exist';
            }
        })
        // function to check if a string contains a capital letter
        function hasUpperCase(str) {
            return (/[A-Z]/.test(str));
        }

        // add password validation
        const password = document.getElementById('password');
        const passwordError = document.getElementById('password-error');
        password.addEventListener('input', () => {
            console.log(password.value.length);
            // password must contain atleast one capital letter
            if (password.value.length < 6) {
                // console.log('password is too short');
                passwordError.innerHTML = 'Password must be at least 6 characters';
                password.classList.add('is-invalid')
                // console.log(passwordError.innerHTML);
            } else if (hasUpperCase(password.value) === false) {
                passwordError.innerHTML = 'Password must contain at least one capital letter';
            } else {
                passwordError.innerHTML = 'Password is valid';
                password.classList.remove('is-invalid')
                password.classList.add('is-valid')
            }
        })


        // function to change the display property of the company field to none when the role === 'Employee'
        function disableSchool() {
            var role = document.getElementById("role").value;
            if (role === "Job Seeker") {
                document.getElementById("school-field").style.display = "none";
                document.getElementById("school").required = false;
                // change age-field to col-md-12
                document.querySelector(".age-field").classList.remove("col-md-6");
                document.querySelector(".age-field").classList.add("col-md-12");
            } else {
                document.getElementById("school-field").style.display = "block";
                // change age-field to col-md-12
                document.querySelector(".age-field").classList.remove("col-md-12");
                document.querySelector(".age-field").classList.add("col-md-6");
            }
        }
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