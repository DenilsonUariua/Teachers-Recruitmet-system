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
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->
    <div class="container p-5">
    <?php
        // if the submit button is clicked find all jobs that match the search criteria
        if (isset($_POST['submit'])) {
            $subject = $_POST['subject'];
            $region = $_POST['region'];
            $grade = $_POST['grade'];
            // connect to the database
            include_once 'dbConfig.php';

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
                echo '<div class="col-md-12 text-center">
                        <h3 class="text-muted">No jobs found!</h3>
                        <div class="p-5"></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>
                    </div>';
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
            <div class="p-5"></div>';
        }
        }
    ?>
    </div>
     <!-- start of footer -->
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'footer.php'; 
    ?>
    <!-- end of footer -->
</body>

</html>