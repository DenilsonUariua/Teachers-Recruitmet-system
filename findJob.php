<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="index.html"><img src="./images/eduhirelogo.png" width="45" height="43" alt="logo"> NamEduHire</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="findJob.php">Find a Job</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="jobPost.php">Post a Job</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- end of navbar -->
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
                    while($row = $query->fetch_assoc()){
                    // display the job in one row
                    echo '
                        <div class="col-md-4">
                            <div class="card m-2 bg-light">
                                <div class="card-body">
                                    <h5 class="card-title">Job Type: '.$row['type_of_job'].'</h5>
                                    <p class="card-text">Description: '.$row['description_of_job'].'</p>
                                    <p class="card-text">Town: '.$row['town'].'</p>
                                    <p class="card-text">Start Date: '.$row['startDate'].'</p>
                                    <p class="card-text">End Date: '.$row['endDate'].'</p>
                                    <a href="jobApplication.php" class="btn btn-primary">Apply</a>
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
<!-- Bootstrap 5 scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>