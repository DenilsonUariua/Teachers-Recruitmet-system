<?php
include_once 'dbConfig.php';
$username = $_GET["username"];
// delete the employer request from the employer_request table
$sql = "DELETE FROM employer_request WHERE username = '$username'";
mysqli_query($db, $sql);
// delete employer
$sql = "DELETE FROM users WHERE username = '$username'";
mysqli_query($db, $sql);
// redirect to adminDashboard.php
header("Location: adminDashboard.php");
