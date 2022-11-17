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
    <title>Latest Jobs</title>
</head>
<style>
    body {
        background-color: darkorange;
    }
</style>

<body>
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->
    <div class="p-4"></div>

    <?php
    // include dbConfig
    include_once 'dbConfig.php';
    // Get jobs from the database that are less than 7 days old
    $query = $db->query("SELECT * FROM jobs WHERE date_posted >= DATE_SUB(NOW(), INTERVAL 3 DAY) ORDER BY id DESC");

    // loop through the jobs until all jobs are displayed
    if ($query->num_rows > 0) {
        // display number of job in database
        echo '<div class="col-md-12 text-center"><p class="text-muted">There are ' . $query->num_rows . ' jobs!</p></div>';
    }
    ?>
    <!-- start of job cards -->
    <div class="container">
        <div class="row">
            <?php
            // loop through the jobs until all jobs are displayed
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) { ?>
                    <div class="col-md-4">
                        <div class="card m-2 bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Job Type: <?php echo $row['type_of_job'] ?></h5>
                                <p class="card-text">Description: <?php echo $row['description_of_job'] ?></p>
                                <p class="card-text">Town: <?php echo $row['town'] ?></p>
                                <p class="card-text">Subject: <?php echo $row['subject'] ?></p>
                                <p class="card-text">Grade: <?php echo $row['grade'] ?></p>
                                <p class="card-text">Start Date: <?php echo $row['startDate'] ?></p>
                                <p class="card-text">End Date: <?php echo $row['endDate'] ?></p>
                                <a href="jobApplication.php" class="btn btn-danger">Apply</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                // if no jobs are found
                echo '<p class="text-muted">Job(s) not found...</p>';
            }
            ?>
        </div>
    </div>
    <!-- add space -->
    <div class="p-4"></div>
    <!-- PHP code to import the footer -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- end of footer -->
</body>

</html>