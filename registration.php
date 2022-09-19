<?php
    // include dbConfig
    include_once 'dbConfig.php';

    // create users table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    age INT(11) NOT NULL
    )";

    // execute the query
    $db->query($sql);

    //save the data to the database
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $role = $_POST['role'];
        $company = $_POST['company'];
        $age = $_POST['age'];

        // check if the username is unique
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {}
        else {

            // insert the data into the database
            $sql = "INSERT INTO users(username, password, address, role, company, age) VALUES('$username', '$password', '$address', '$role', '$company', '$age')";
            // execute the query
            $db->query($sql);
            //wait 3 seconds before redirect to the login page
            header("refresh:3;url=login.php");
            
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

<body>
    <!-- Navbar  -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->

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
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" aria-label="Default select example" name="role" id="role" onchange="disableCompany()" required>
                        <option selected hidden value="">Role</option>
                        <option value="Employer">Employer</option>
                        <option value="Employee">Employee</option>
                    </select>
                </div>
                <div class="col-md-6" id="company-field">
                    <label for="validationServer02" class="form-label">Company</label>
                    <input type="text" name="company" class="form-control " id="company" value="" required/>
                    <div class="valid-feedback">Looks good!</div>
                </div>

                <div class="col-md-6 age-field">
                    <label for="validationServerUsername" class="form-label">Age</label>
                    <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend3">#</span>
                        <input type="number" name="age" class="form-control " id="validationServerUsername"
                            aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required />
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-danger" id="submit" type="submit" name="submit">Sign Up</button>
                </div>
            </form>
        </div>
        <div class='d-flex justify-content-center'>
            <!-- php code to save the data to the database -->
           
        </div>
    </div>
    <!-- End of Form -->
    <div class="p-3"></div>
    <div class="p-5"></div>
    <!-- Bootstrap 5 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <!-- start of footer -->
    <?php
    if(isset($_POST['submit'])){
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
        }  
        else {
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
        // function to change the display property of the company field to none when the role === 'Employee'
        function disableCompany() {
            var role = document.getElementById("role").value;
            if (role === "Employee") {
                document.getElementById("company-field").style.display = "none";
                document.getElementById("company").required = false;
                // change age-field to col-md-12
                document.querySelector(".age-field").classList.remove("col-md-6");
                document.querySelector(".age-field").classList.add("col-md-12");
            } else {
                document.getElementById("company-field").style.display = "block";
                // change age-field to col-md-12
                document.querySelector(".age-field").classList.remove("col-md-12");
                document.querySelector(".age-field").classList.add("col-md-6");
            }
        }
    </script>
</body>
</html>