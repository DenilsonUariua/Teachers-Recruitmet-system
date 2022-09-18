<?php
session_start();
// include dbConfig.php
include_once 'dbConfig.php'; 
?>

<!--Nav Bar-->
 <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">

            <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
                <img src="./images/eduhirelogo.png" width="45" height="43" alt="logo">
                NamEduHire
            </a>

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
                    if(isset($_SESSION['username'])){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="findJob.php">Find Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="jobPost.php">Post Job</a>
                    </li>
                    <a href="logout.php" style="text-decoration: none; color: black;"> <button
                    class="btn btn-danger btn-lg mx-2" style="border-radius: 0">Logout</button></a>';
                    }
                    else{
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
    <div class="p-2"></div>
    <button type="button" class="btn btn-outline-dark mx-2" onclick="history.back()">Back</button>