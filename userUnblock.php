<?php
include_once 'dbConfig.php';
$username = $_GET["username"];
// update the status to pending
$sql = "UPDATE users SET status = 'approved' WHERE username = '$username'";
mysqli_query($db, $sql);
// redirect to adminDashboard.php
header("Location: usersTable.php");
