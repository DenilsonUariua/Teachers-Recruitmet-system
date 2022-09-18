<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- add logo to the browser tab -->
    <link rel="icon" href="./images/eduhirelogo.png" />
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Create Job Post</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <!-- start of navbar  -->
    <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar  -->
    <div class="p-4"></div>
    <!-- form for creating a job post -->
    <div class="container-md bg-light border">
        <div class="py-2">
            <h3>Post A New Job</h3>
        </div>
        <form class="row g-3" action="jobPost.php" method="post">
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Job Title</label>
                <input type="text" name="jobTitle" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-12">
                <label for="type_of_job" class="form-label">Job Type</label>
                <select class="form-control" aria-label="Default select example" name="type_of_job">
                    <option selected hidden>Job Type</option>
                    <option value="Internship">Internship</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Volunteer">Volunteer</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Town</label>
                <input type="text" name="town" class="form-control" id="inputPassword4" placeholder="">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">Start Date</label>
                <input type="date" name="startDate" class="form-control" id="inputAddress2"
                    placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-6">
                <label for="inputAddress2" class="form-label">End Date</label>
                <input type="date" name="endDate" class="form-control" id="inputAddress2"
                    placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-4">
                <label for="inputAddress2" class="form-label">Region</label>
                <select class="form-control" aria-label="Default select example" name="region">
                    <option selected hidden>Regions</option>
                    <option value="Caprivi">Caprivi</option>
                    <option value="Erongo">Erongo</option>
                    <option value="Hardap">Hardap</option>
                    <option value="Kharas">kharas</option>
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
                <select class="form-control" aria-label="Default select example" name="subject">
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
                <select class="form-control" aria-label="Default select example" name="grade">
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
                    <textarea class="form-control" name="requirements" placeholder="Leave a comment here"
                        id="requirements"></textarea>
                    <label for="requirements">Requirements</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" name="description_of_job" placeholder="Leave a comment here"
                        id="Description"></textarea>
                    <label for="description">Description</label>
                </div>
            </div>

            <div class="col-12">
                <h4>Company Details</h4>
            </div>

            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Company Name</label>
                <input type="text" name="town" class="form-control" id="inputPassword4" placeholder="">
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Website (Optional)</label>
                <input type="text" name="website" class="form-control" id="inputPassword4" placeholder="http://">
            </div>
            <div class="col-12">
                <label for="fileUpload" class="form-label">Upload PDF or Image File</label>
                <input type="file" class="form-control" id="fileUpload" name="fileUpload"
                    placeholder="Upload PDF or Image">
            </div>
            <div class="col-12 my-3">
                <button type="submit" name="submit" class="btn btn-primary">Post Job</button>
            </div>
        </form>
    </div>
    <div class="p-4"></div>

    <!-- start of footer -->
    <?php
        include_once 'footer.php'; 
    ?>
    <!-- end of footer -->
    <!-- handle form submission -->
    <?php
        //connect to database
        include_once 'dbConfig.php';
        //check if table jobs exists in the database, if not create it
        // fileUpload should upload the file to the database
        $sql = "CREATE TABLE IF NOT EXISTS jobs (
            id INT(11) NOT NULL AUTO_INCREMENT,
            job_title VARCHAR(255) NOT NULL,
            type_of_job VARCHAR(255) NOT NULL,
            startDate DATE NOT NULL,
            endDate DATE NOT NULL,
            region VARCHAR(255) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            grade VARCHAR(255) NOT NULL,
            requirements VARCHAR(255) NOT NULL,
            description_of_job VARCHAR(255) NOT NULL,
            company_name VARCHAR(255) NOT NULL,
            website VARCHAR(255) NOT NULL,
            town VARCHAR(255) NOT NULL,
            fileUpload LONGBLOB NOT NULL,
            PRIMARY KEY (id)
        )";
        


      //execute the query
      $db->query($sql);

      //send values into jobs table in the database
      if(isset($_POST['submit'])){
        //  insert into jobs table
        $job_title = $_POST['job_title'];
        $type_of_job = $_POST['type_of_job'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $region = $_POST['region'];
        $subject = $_POST['subject'];
        $grade = $_POST['grade'];
        $requirements = $_POST['requirements'];
        $description_of_job = $_POST['description_of_job'];
        $company_name = $_POST['company_name'];
        $website = $_POST['website'];
        $town = $_POST['town'];
        $fileUpload = $_POST['fileUpload'];

        $sql = "INSERT INTO jobs (job_title, type_of_job, startDate, endDate, region, subject, grade, requirements, description_of_job, company_name, website, town, fileUpload) VALUES ('$job_title', '$type_of_job', '$startDate', '$endDate', '$region', '$subject', '$grade', '$requirements', '$description_of_job', '$company_name', '$website', '$town', '$fileUpload')";
        $db->query($sql);
      }
    ?>


    <!--bootstrap 5 imports   -->
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