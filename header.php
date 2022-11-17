<?php
// if session is not started start session
if (!isset($_SESSION)) {
    session_start();
}
// include dbConfig.php
include_once 'dbConfig.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!--Nav Bar-->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">

        <a class="navbar-brand" href="<?php
                                        // if the user is logged in redirect to the homepage
                                        if (isset($_SESSION['username'])) {
                                            echo 'homepage.php';
                                        } else {
                                            echo 'index.php';
                                        }
                                        ?>" style="display: flex; align-items: center;">
            <img src="./images/eduhirelogo.png" width="45" height="43" alt="logo">
            NamEduHire
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
        
            <?php
            if (isset($_SESSION['username'])) {
                // if the user role is employer, display employer navbar
                if ($_SESSION['role'] == 'Employer') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="findJob.php">Find Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jobPost.php">Post Job</a>
                    </li>
                    <a href="logout.php" style="text-decoration: none; color: black;">
                        <button class="btn btn-danger btn-lg mx-2" style="border-radius: 0">
                            Logout
                        </button>
                    </a>
                    <div class="dropdown m-1">
                        <button style="border-radius: 0; height: 3rem;" class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Jobs
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="applicationsPosted.php">See Applications</a></li>
                            <li><a class="dropdown-item" href="jobsPosted.php">See Job Post</a></li>
                        </ul>
                    </div>
                <?php } elseif ($_SESSION['role'] == 'Admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="adminDashboard.php">Dashboard</a>
                    </li>
                    <a href="logout.php" style="text-decoration: none; color: black;">
                        <button class="btn btn-danger btn-lg mx-2" style="border-radius: 0">
                            Logout
                        </button>
                    </a>

                <?php } elseif ($_SESSION['role'] == 'Job Seeker') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="findJob.php">Find Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jobPost.php">Post Job</a>
                    </li>
                    <a href="logout.php" style="text-decoration: none; color: black;"> <button class="btn btn-danger btn-lg mx-2" style="border-radius: 0">Logout</button></a>
                <?php
                }
            } else { ?>
                <div class="d-flex">
                    <a href="login.php" style="text-decoration: none; color: black;"> <button class="btn btn-danger btn-lg mx-2" style="border-radius: 0">Login</button></a>
                    <a href="registration.php" style="text-decoration: none; color: black;">
                        <button class="btn btn-outline-danger btn-lg" style="border-radius: 0">Sign
                            Up</button></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</nav>
<div class="p-2"></div>
<!-- only display back button if not on the homepage -->
<?php if (basename($_SERVER['PHP_SELF']) != 'index.php' && basename($_SERVER['PHP_SELF']) != 'homepage.php') { ?>
    <button type="button" class="btn btn-outline-dark mx-2" onclick="history.back()">Back</button>
<?php } ?>