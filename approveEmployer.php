<?php
include_once 'dbConfig.php';
$username = $_GET["username"];
// select the employer from the employers table
$sql = "SELECT * FROM employers WHERE username = '$username'";
$result = mysqli_query($db, $sql);
// change status to approved
$sql = "UPDATE employers SET status = 'approved' WHERE username = '$username'";
mysqli_query($db, $sql);
// delete the employer request from the employer_request table
$sql = "DELETE FROM employer_request WHERE username = '$username'";
mysqli_query($db, $sql);
// redirect to adminDashboard.php
header("Location: adminDashboard.php");
