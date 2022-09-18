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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
    <title>Find Job</title>
</head>

<body>

    <!-- start of navbar -->
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->
    <!-- create search bar -->
    <div class="search-job text-center m-2">
        <form action="findJob.php" method="post">
            <select class="form-control" aria-label="Default select example" name="jobType">
                <option selected hidden>Click to Select Job Type</option>
                <option value="internship">Internship</option>
                <option value="volunteer">Volunteer</option>
                <option value="permanent">Permanent</option>
            </select>
            <button class="btn2" name="submit">Find Job</button>
        </form>
    </div>
    <!-- end of search bar -->
    <div class="p-4"></div>
    <div class="container m-6 ">
        <div class="row">
            <?php 
                // connect to database
                $db = mysqli_connect('localhost', 'root', '', 'test');
                //check if connection was successful
                if(!$db){
                    die("Connection failed: " . mysqli_connect_error());
                }
                // Get jobs from the database
                $query = $db->query("SELECT * FROM jobs ORDER BY id DESC");
                // loop through the jobs until all jobs are displayed
                if($query->num_rows > 0){ 
                    // display number of job in database
                    echo '<div class="col-md-12 text-center"><p class="text-muted">There are '.$query->num_rows.' jobs!</p></div>';
                }
                // if form is submitted fetch jobs from database that match the job type
                if(isset($_POST['submit'])){
                  // clear the previous search results
                  echo '<div class="col-md-4"></div>';
                    $jobType = $_POST['jobType'];
                    $query = $db->query("SELECT * FROM jobs WHERE type_of_job = '$jobType' ORDER BY id DESC");
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
                                        <a href="jobApplication.php" class="btn btn-primary">Apply</a>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                    // display message if no jobs are found
                    else{
                        echo '<div class="col-md-12 text-center"><p class="text-muted">No jobs found!</p></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>';
                    }
                }
                // if form is not submitted fetch all jobs from database
                else{
                    // loop through the jobs until all jobs are displayed
                    while($row = $query->fetch_assoc()){
                        // display the job in one row
                        echo '
                        <div class="col-md-4">
                        <div class="card m-2 bg-light">
                            <div class="card-body d-inline-flex">
                                <div class="col" style="width: 40%">
                                <img src="./images/eduhirelogo.png" class="card-img-top" alt="company-logo">
                                </div>
                                <div class="col" style="width: 60%">
                                    <h5 class="card-title">Job Type: '.$row['type_of_job'].'</h5>
                                    <p class="card-text">Description: '.$row['description_of_job'].'</p>
                                    <p class="card-text">Town: '.$row['town'].'</p>
                                    <p class="card-text">Subject: '.$row['subject'].'</p>
                                    <p class="card-text">Grade: '.$row['grade'].'</p>
                                    <p class="card-text">Start Date: '.$row['startDate'].'</p>
                                    <p class="card-text">End Date: '.$row['endDate'].'</p>
                                    <a href="jobApplication.php" class="btn btn-primary">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                }
            ?>
            <!-- end of card groups -->
        </div>
    </div>
    <div class="p-4"></div>
    <!-- start of footer -->
    <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'footer.php'; 
    ?>
    <!-- end of footer -->
    <!-- Bootstrap 5 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
</body>

</html>