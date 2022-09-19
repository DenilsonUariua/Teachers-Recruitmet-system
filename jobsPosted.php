<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
    <title>Jobs</title>
</head>

<body>
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->
    <div class="p-1"></div>
    <div class="container text-center">
        <div class="row">
            <?php
                // get all the job from the db that match the session user's company
                include_once 'dbConfig.php';
                $company = $_SESSION['company'];
                $query = $db->query("SELECT * FROM jobs WHERE company_name = '$company'");
                // loop through the jobs until all jobs are displayed
                if($query->num_rows > 0){ 
                    while($row = $query->fetch_assoc()){
                    // display the job in one row
                    // add update and delete buttons
                    echo '
                        <div class="col-md-12">
                            <div class="card m-2 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Job Type: '.$row['type_of_job'].'</h5>
                                    <p class="card-text">Job Title: '.$row['job_title'].'</p>
                                    <p class="card-text">Description: '.$row['description_of_job'].'</p>
                                    <p class="card-text">Town: '.$row['town'].'</p>
                                    <p class="card-text">Subject: '.$row['subject'].'</p>
                                    <p class="card-text">Grade: '.$row['grade'].'</p>
                                    <p class="card-text">Start Date: '.$row['startDate'].'</p>
                                    <p class="card-text">End Date: '.$row['endDate'].'</p>
                                    <a href="updateJob.php?id='.$row['id'].'" class="btn btn-primary">Update</a>
                                    <a href="deleteJob.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    ';
                    }
                }else{
                    echo '<h3>No job(s) found</h3>
                    <div class="p-5"></div>
                    <div class="p-5"></div>
                    <div class="p-5 "></div>
                    <div class="p-5 "></div>
                    ';
                }
            ?>
        </div>
    </div>
    <div class="p-4"></div>
    <!-- PHP code to import the footer -->
    <?php
        include_once 'footer.php';
    ?>
</body>
</html>