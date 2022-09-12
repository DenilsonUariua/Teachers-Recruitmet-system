<?php
    session_start();

    // if the submit button is clicked find all jobs that match the search criteria
    if (isset($_POST['submit'])) {
        $subject = $_POST['subject'];
        $region = $_POST['region'];
        $grade = $_POST['grade'];

        // connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'test');

        // check is the user is logged in
        if (isset($_SESSION['username'])) {
            // fetch and display the jobs that match the search criteria
            $sql = "SELECT * FROM jobs WHERE subject='$subject' AND region='$region' AND grade='$grade'";
            $result = mysqli_query($db, $sql);
            $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($db);

            // display the jobs
            foreach ($jobs as $job) {
                echo $job['title'] . '<br>';
            }

        } else {
            // ask the user to login if they are not logged in
            echo "<h1>You must be logged in to view jobs </h1>";
        }

       
    }    
?>