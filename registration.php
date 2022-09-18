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

        if (mysqli_num_rows($result) > 0) {
            echo 'Username already exists';
            // display toast notification
            echo '<script>
            var toastElList = [].slice.call(document.querySelectorAll(".toast"))
            var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl)
            })
            toastList.forEach(toast => toast.show())
            </script>';
        } else {

            // insert the data into the database
            $sql = "INSERT INTO users(username, password, address, role, company, age) VALUES('$username', '$password', '$address', '$role', '$company', '$age')";
            // execute the query
            $db->query($sql);
            // redirect to the login page
            header('Location: login.php');
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
                <div class="col-md-6">
                    <label for="validationServer02" class="form-label">Company</label>
                    <input type="text" name="company" class="form-control " id="company" value="" required/>
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
                    <button class="btn btn-danger" type="submit" name="submit">Sign Up</button>
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

    <!-- start of footer -->
    <?php
        include_once 'footer.php'; 
    ?>
    <!-- end of footer -->
    <script>
        // function to disable the company field when the role === 'Employee'
        function disableCompany() {
            var role = document.getElementById("role").value;
            console.log("Role: ",role)
            if (role === "Employee") {
                document.getElementById("company").disabled = true;
            } else {
                document.getElementById("company").disabled = false;
            }
        }
        disableCompany()
    </script>
</body>
</html>