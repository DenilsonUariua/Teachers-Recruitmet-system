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
    <title>Job Applications</title>
</head>
<style>
    .card{
        border-radius: 0;
    }
    body {
        background-color: lightgray;
    }
</style>
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
            $query = $db->query("SELECT * FROM jobapplication WHERE school = '$company'");
            // loop through the jobs until all jobs are displayed
            if ($query->num_rows > 0) {

                while ($row = $query->fetch_assoc()) {
                    // Get image from database that matches the fileUpload 
                    $resume = $row['resume'];
                    // echo $resume;
                    $query2 = $db->query("SELECT * FROM images WHERE file_name = '$resume'");
                    $row2 = $query2->fetch_assoc();
                    $pdfURL = 'downloadpdf.php?file=jobApplications/' . $resume;
            ?>
                    <div class="col-md-6">
                        <div class="card m-2 p-5 bg-light">
                            
                            <div class="card-body bg-white">
                                <h5 class="card-title">Name: <?php echo $row['name'] ?></h5>
                                <p class="card-text">Email: <?php echo $row['email'] ?></p>
                                <p class="card-text">Address: <?php echo $row['address'] ?></p>
                                <p class="card-text">Phone number: <?php echo $row['phone'] ?></p>
                                <p class="card-text">Position: <?php echo $row['position'] ?></p>
                                <p class="card-text">Date applied: <?php echo $row['reg_date'] ?></p>
                                <a href=<?php echo $pdfURL ?>>Resume</a>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <h3>No job application(s) found</h3>
                <div class="p-5"></div>
                <div class="p-5"></div>
                <div class="p-5 "></div>
                <div class="p-5 "></div>
            <?php
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