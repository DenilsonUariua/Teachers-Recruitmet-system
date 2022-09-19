<?php 
    // include the database connection file
    include_once("dbConfig.php");
    // get the id of the job to be deleted
    $id = $_GET['id'];
    // delete the job from the database and check if the job was deleted
    $result = mysqli_query($db, "DELETE FROM jobs WHERE id=$id");
    if($result){
        // if the job was deleted redirect to the jobSearch page
        header("Location: jobsPosted.php");
    }
    else{
        // if the job was not deleted display an error message
        echo "Error deleting record: " . mysqli_error($db);
    }
?>