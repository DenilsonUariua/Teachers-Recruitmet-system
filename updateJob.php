<?php
include_once 'dbConfig.php';
$id = $_GET['id'];
// when the submit button is clicked update the job
if (isset($_POST['submit'])) {
    // get the new values for the job
    $jobTitle = $_POST['job_title'];
    $description = $_POST['description_of_job'];
    $town = $_POST['town'];
    $region = $_POST['region'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $typeOfJob = $_POST['type_of_job'];

    // update the job in the database
    $result = $db->query("UPDATE jobs SET job_title = '$jobTitle', description_of_job = '$description', 
    town = '$town', region = '$region', subject = '$subject', grade = '$grade', startDate = '$startDate', 
    endDate = '$endDate', type_of_job = '$typeOfJob' WHERE id = '$id'");

    // check if the job was updated
    if ($result) {
        // if the job was updated redirect to the jobsPosted page
        header("Location: jobsPosted.php");
    } else {
        // if the job was not updated display an error message
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>

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
    <title> Update Job <?php echo $id; ?></title>
</head>

<body>
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'header.php';
    ?>
    <!-- end of navbar -->

    <!-- add form to update a job -->
    <div class="container-md bg-light border">
        <div class="py-2">
            <h3>Update A Job</h3>
        </div>
        <form class="row g-3" action="updateJob.php" method="post">
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Job Title</label>
                <input value=<?php
                                // get the job from the db that matches the id
                                $query = $db->query("SELECT * FROM jobs WHERE id = '$id'");
                                // fetch the job from the db
                                $row = $query->fetch_assoc();
                                // display the job title
                                echo $row['job_title'];
                                ?> type="text" name="job_title" class="form-control" id="inputPassword4" required>
            </div>
            <div class="col-md-12">
                <label for="type_of_job" class="form-label">Job Type</label>
                <select class="form-control" aria-label="Default select example" name="type_of_job" required>
                    <option selected hidden>Job Type</option>
                    <option value="Internship">Internship</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Volunteer">Volunteer</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Town</label>
                <input value=<?php
                                // get the job from the db that matches the id
                                $query = $db->query("SELECT * FROM jobs WHERE id = '$id'");
                                // fetch the job from the db
                                $row = $query->fetch_assoc();
                                // display the job title
                                echo $row['town'];
                                ?> type="text" name="town" class="form-control" id="inputPassword4" placeholder="" required>
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">Start Date</label>
                <input type="date" name="startDate" class="form-control" id="inputAddress2">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">End Date</label>
                <input type="date" name="endDate" class="form-control" id="inputAddress2" required>
            </div>
            <div class="col-4">
                <label for="inputAddress2" class="form-label">Region</label>
                <select class="form-control" aria-label="Default select example" name="region" required>
                    <option selected hidden>Regions</option>
                    <option value="Caprivi">Caprivi</option>
                    <option value="Erongo">Erongo</option>
                    <option value="Hardap">Hardap</option>
                    <option value="Kharas">Kharas</option>
                    <option value="Kavango">Kavango </option>
                    <option value="Khomas">Khomas </option>
                    <option value="Kunene">Kunene </option>
                    <option value="Ohangwena">Ohangwena</option>
                    <option value="Omaheke ">Omaheke </option>
                    <option value="Omusati">Omusati </option>
                    <option value="Oshana">Oshana</option>
                    <option value="Oshikoto">Oshikoto</option>
                    <option value="Otjozondjupa">Otjozondjupa</option>
                </select>
                </select>
            </div>
            <div class="col-4">
                <label for="inputAddress2" class="form-label">Subject</label>
                <select class="form-control" aria-label="Default select example" name="subject" required>
                    <option selected hidden>Subjects</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Geography">Geography</option>
                    <option value="Biology">Biology</option>
                    <option value="Physical Science">Physical Science</option>
                    <option value="Physical Education">Physical Education</option>
                    <option value="Languages">Languages</option>
                    <option value="Arts">Arts</option>
                    <option value="History">History</option>
                    <option value="Life Skills">Life Skills</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Design & Technology">Design & Technology</option>
                </select>
            </div>
            <div class="col-4">
                <label for="inputAddress2" class="form-label">Grade</label>
                <select class="form-control" aria-label="Default select example" name="grade" required>
                    <option selected hidden>Grades</option>
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                    <option value="4">Grade 4</option>
                    <option value="5">Grade 5</option>
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                </select>
            </div>

            <div class="col-12">
                <div class="form-floating">
                    <textarea value=<?php
                                    // get the job from the db that matches the id
                                    $query = $db->query("SELECT * FROM jobs WHERE id = '$id'");
                                    // fetch the job from the db
                                    $row = $query->fetch_assoc();
                                    // display the job title
                                    echo $row['requirements'];
                                    ?> class="form-control" name="requirements" placeholder="Leave a comment here" id="requirements"></textarea>
                    <label for="requirements">Requirements</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" name="description_of_job" placeholder="Leave a comment here" id="Description" required></textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <div class="col-12">
                <h4>Company Details</h4>
            </div>

            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Company Name</label>
                <input value=<?php
                                // get the job from the db that matches the id
                                $query = $db->query("SELECT * FROM jobs WHERE id = '$id'");
                                // fetch the job from the db
                                $row = $query->fetch_assoc();
                                // display the job title
                                echo $row['company_name'];
                                ?> type="text" name="company_name" class="form-control" id="inputPassword4" placeholder="" required>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Website (Optional)</label>
                <input value=<?php
                                // get the job from the db that matches the id
                                $query = $db->query("SELECT * FROM jobs WHERE id = '$id'");
                                // fetch the job from the db
                                $row = $query->fetch_assoc();
                                // display the job title
                                echo $row['website'];
                                ?> type="text" name="website" class="form-control" id="inputPassword4" placeholder="http://">
            </div>
            <div class="col-12">
                <label for="fileUpload" class="form-label">Upload PDF or Image File</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload" placeholder="Upload PDF or Image">
            </div>
            <div class="col-12 my-3">
                <button id="submit" type="submit" name="submit" class="btn btn-danger">Update Job</button>
            </div>
        </form>
    </div>
</body>

</html>