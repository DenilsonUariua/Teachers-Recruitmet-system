<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> NamEduHire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
    <title>About Us</title>
</head>

<body>
    <!-- About us page with a navbar and body container containing text -->
    <!-- start of navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="./images/eduhirelogo.png" width="45" height="43"
                    alt="logo"> NamEduHire</a>
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
                </ul>
                <?php 
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            echo '<li class="nav-item">
                            <a class="nav-link" href="findJob.php">Find Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobPost.php">Post Job</a>
                        </li>
                        <a href="logout.php" style="text-decoration: none; color: black;"> <button
                        class="btn btn-danger btn-lg mx-2" style="border-radius: 0">Logout</button></a>';
                        } else {
                            echo '<div class="d-flex">
                            <a href="login.php" style="text-decoration: none; color: black;"> <button
                                    class="btn btn-danger btn-lg mx-2" style="border-radius: 0">Login</button></a>
                            <a href="registration.php" style="text-decoration: none; color: black;">
                            <button class="btn btn-outline-danger btn-lg" style="border-radius: 0">Sign
                                    Up</button></a>
                        </div>';
                        } 
                    ?>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <div class="container p-5">
    <?php
      

        // if the submit button is clicked find all jobs that match the search criteria
        if (isset($_POST['submit'])) {
            $subject = $_POST['subject'];
            $region = $_POST['region'];
            $grade = $_POST['grade'];
            // connect to the database
            $db = mysqli_connect('localhost', 'root', '', 'test');

            // check is the user is logged in
            if (isset($_SESSION['username'])) {
            // clear the previous search results
            echo '<div class="col-md-4"></div>';
            $query = $db->query("SELECT * FROM jobs WHERE region = '$region' OR subject = '$subject' OR grade = '$grade'");
            // loop through the jobs until all jobs are displayed
            if($query->num_rows > 0){ 
                while($row = $query->fetch_assoc()){
                // display the job in one row
                echo '
                    <div class="col-md-4">
                        <div class="card m-2 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Job Type: '.$row['type_of_job'].'</h5>
                                <p class="card-text">Description: '.$row['description_of_job'].'</p>
                                <p class="card-text">Town: '.$row['town'].'</p>
                                <p class="card-text">Subject: '.$row['subject'].'</p>
                                <p class="card-text">Grade: '.$row['grade'].'</p>
                                <p class="card-text">Start Date: '.$row['startDate'].'</p>
                                <p class="card-text">End Date: '.$row['endDate'].'</p>
                                <a href="jobApplication.php" class="btn btn-danger">Apply</a>
                            </div>
                        </div>
                    </div>';
                }
            }
            // display message if no jobs are found
            else{
                echo '<div class="col-md-12 text-center"><p class="text-muted">No jobs found!</p></div>';
            }
            }
        else{
            // if the user is not logged in display a message
            echo '
            <div class="container"> 
                <div class="col-md-12 text-center">
                    <h3 class="text-muted m-5">Please login to view jobs!</h3>
                </div>
            </div>
            <div class="p-5"></div>
            <div class="p-5"></div>
            <div class="p-5"></div>';
        }
        }
    ?>
    </div>
     <!-- start of footer -->
     <footer class="footer bg-light">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <a class="navbar-brand" href="index.php">
                            <img src="./images/eduhirelogo.png" width="45" height="43" alt="logo">
                            NamEduHire
                        </a>
                        <p>this is some paragraph text that is suppose
                            to be replaced</p>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <h4>Quick Links</h4>
                        <a href="about.php" class="footer-links">About Us</a>
                        <a href="about.php" class="footer-links">Support</a>
                        <a href="about.php" class="footer-links">License</a>
                        <a href="about.php" class="footer-links">Contact</a>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <a href="" class="footer-links">Terms & Conditions</a>
                        <a href="" class="footer-links">Privacy</a>
                        <a href="" class="footer-links">Referral Terms</a>
                        <a href="" class="footer-links">Product License</a>
                    </div>
                </div>
                <div class="col">
                    <h4>Subscribe Now</h4>
                    <p>Sed kjfiaf i fioafia fia foiasf a fioai sfijaf aif ajfioa</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="d-inline-flex" style="justify-content: space-between;">
                        <!-- facebook icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-facebook mx-2" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                        <!-- Instagram icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-instagram mx-2" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                        <!-- Linkedin icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-linkedin mx-2" viewBox="0 0 16 16">
                            <path
                                d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                        </svg>
                        <!-- Twitter Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-twitter mx-2" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->
</body>

</html>