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
<style>
    body {
        background-color: darkorange;
    }
    .card-img-top {
        height: 200px;
        width: 200px;
        object-fit: cover;
    }

    .card {
        border-radius: 0;
        border: 1px solid darkred;
        background-color: #FCF9F9;
        /* add hover effects */
        transition: all 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 0 14px 0 rgba(0, 0, 0, 0.6);
    }

    .btn2 {
        width: 6rem;
    }

    .btn2:hover {
        transform: scale(1.05);
        box-shadow: 0px 0 14px 0 rgba(0, 0, 0, 0.6);
    }
</style>

<body>

    <!-- start of navbar -->
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->

    <!-- Toast notification to welcome the user -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./images/eduhirelogo.png" class="rounded me-2" alt="..." style="height: 20px; width: 20px;">
                <strong class="me-auto">NamEduHire</strong>
                <small><?php
                        echo date("h:i:sa");
                        ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php
                // check if session is set
                if (isset($_SESSION['username'])) {
                    // if session is set, display welcome message
                    echo "Welcome " . $_SESSION['username'] . "!";
                }
                ?>
            </div>
        </div>
    </div>

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

    <div class="row row-cols-1 row-cols-md-2 g-4 m-3">
        <?php
        // connect to database
        include_once 'dbConfig.php';
        // Get jobs from the database
        $query = $db->query("SELECT * FROM jobs ORDER BY id DESC");
        // loop through the jobs until all jobs are displayed
        if ($query->num_rows > 0) {
            // display number of job in database
            echo '<div class="col-md-12 text-center"><p class="text-muted">There are ' . $query->num_rows . ' jobs!</p></div>';
        }
        // if form is submitted fetch jobs from database that match the job type
        if (isset($_POST['submit'])) {

            $jobType = $_POST['jobType'];
            $query = $db->query("SELECT * FROM jobs WHERE type_of_job = '$jobType' ORDER BY id DESC");
            // loop through the jobs until all jobs are displayed
            if ($query->num_rows > 0) {

                while ($row = $query->fetch_assoc()) {
                    // Get image from database that matches the fileUpload 
                    $fileUpload = $row['fileUpload'];
                    // echo $fileUpload;
                    $query2 = $db->query("SELECT * FROM images WHERE file_name = '$fileUpload'");
                    $row2 = $query2->fetch_assoc();
                    $imageURL = 'uploads/' . $row2["file_name"]; ?>

                    <div class="col">
                        <div class="card">
                            <img src="<?php echo $imageURL; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Description</h5>

                                <p class="card-text"> <?php echo $row['description_of_job'] ?></p>
                                <p class="card-text">Town: <?php echo $row['town'] ?></p>
                                <p class="card-text">Subject: <?php echo $row['subject'] ?></p>
                                <p class="card-text">Grade: <?php echo $row['grade'] ?></p>
                                <p class="card-text">Start Date: <?php echo $row['startDate'] ?></p>
                                <p class="card-text">End Date: <?php echo $row['endDate'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            // display message if no jobs are found
            else {
                echo '<div class="col-md-12 text-center"><p class="text-muted">No jobs found!</p></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>';
            }
        }
        // if form is not submitted fetch all jobs from database
        else {
            // if there are no jobs in the db display message
            if ($query->num_rows < 1) {
                echo '<div class="col-md-12 text-center"><p class="text-muted">No jobs found!</p></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>
                        <div class="p-5"></div>';
            } else {
                // loop through the jobs until all jobs are displayed
                while ($row = $query->fetch_assoc()) {
                    // Get image from database that matches the fileUpload 
                    $fileUpload = $row['fileUpload'];
                    // echo $fileUpload;
                    $query2 = $db->query("SELECT * FROM images WHERE file_name = '$fileUpload'");
                    $row2 = $query2->fetch_assoc();
                    $imageURL = 'uploads/' . $row2["file_name"];
                ?>

                    <div class="col">
                        <div class="card">
                            <img src="<?php echo $imageURL; ?>" height="200" width="50" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-title fw-bold">Description</p>

                                <p class="card-text fw-semibold"> <?php echo $row['description_of_job'] ?></p>
                                <p class="card-text fw-light">Town: <?php echo $row['town'] ?></p>
                                <p class="card-text fw-light">Subject: <?php echo $row['subject'] ?></p>
                                <p class="card-text fw-light">Grade: <?php echo $row['grade'] ?></p>
                                <p class="card-text fw-light">End Date: <?php echo $row['endDate'] ?></p>
                                <a href="jobApplication.php" target="_blank" rel="noopener noreferrer"><button class="btn2 form">Apply</button></a>
                            </div>
                        </div>
                    </div>
        <?php
                }
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

    <script>
        const toastLiveExample = document.getElementById('liveToast')
        // if the previous page was login.php show toast 
        if (document.referrer == "http://localhost/Teachers-Recruitmet-system/login.php") {
            console.log("show toast");
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
            // hide toast after 3 seconds
            setTimeout(function() {
                toast.hide()
            }, 3000);
        }
    </script>
</body>

</html>