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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="./images/eduhirelogo.png" width="45" height="43"
                    alt="logo"> NamEduHire</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="findJob.php">Find a Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Post a Job</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar  -->
    <div class="p-4"></div>
    <!-- form for creating a job post -->
    <div class="container-md bg-light border">
        <form class="row g-3" action="jobPost.php" method="post">
            <div class="col-md-6">
                <label for="type_of_job" class="form-label">Job Type</label>
                <select class="form-control" aria-label="Default select example" name="type_of_job">
                    <option selected disabled>Job Type</option>
                    <option value="Internship">Internship</option>
                    <option value="Permanent">Permanent</option>
                    <option value="Volunteer">Volunteer</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Town</label>
                <input type="text" name="town" class="form-control" id="inputPassword4" placeholder="Tsumeb">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Employer information</label>
                <input type="text" name="employer" class="form-control" id="inputAddress" placeholder="Name">
            </div>

            <div class="col-12">
                <label for="inputAddress" class="form-label">Seniority Level</label>
                <input type="text" name="seniority_level" class="form-control" id="inputAddress"
                    placeholder="Entry level">
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
                    <option selected disabled>Regions</option>
                    <option value="Caprivi">Caprivi</option>
                    <option value="erongo">Erongo</option>
                    <option value="Hardap">Hardap</option>
                    <option value="kharas">kharas</option>
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
                    <option selected>Subjects</option>
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
                    <option selected>Grades</option>
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
    <!-- handle form submission -->
    <?php
      //connect to database
      //create variables for the database connection
      $host = 'localhost';
      $database = 'test';
      $user = 'root';
      $password = '';

      //create a connection to the database
      $db = mysqli_connect($host, $user, $password, $database);
      //check if the connection failed
      if(mysqli_connect_errno()){
          echo 'Database connection failed with following errors: '.mysqli_connect_error();
          die();
      }
      else{}
      //check if table jobs exists in the database, if not create it
      $sql = "CREATE TABLE IF NOT EXISTS jobs(
          id INT(11) NOT NULL AUTO_INCREMENT,
          type_of_job VARCHAR(255) NOT NULL,
          town VARCHAR(255) NOT NULL,
          employer VARCHAR(255) NOT NULL,
          seniority_level VARCHAR(255) NOT NULL,
          region VARCHAR(255) NOT NULL,
          subject_of_job VARCHAR(255) NOT NULL,
          grade VARCHAR(255) NOT NULL,
          startDate DATE NOT NULL,
          endDate DATE NOT NULL,
          requirements VARCHAR(255) NOT NULL,
          description_of_job VARCHAR(255) NOT NULL,
        
          PRIMARY KEY(id)
      )";
      //execute the query
      $db->query($sql);

      //send values into jobs table in the database
      if(isset($_POST['submit'])){
          $type_of_job = $_POST['type_of_job'];
          $town = $_POST['town'];
          $employer = $_POST['employer'];
          $seniority_level = $_POST['seniority_level'];
          $startDate = $_POST['startDate'];
          $endDate = $_POST['endDate'];
          $region = $_POST['region'];
          $subject = $_POST['subject'];
          $grade = $_POST['grade'];
          $requirements = $_POST['requirements'];
          $description_of_job = $_POST['description_of_job'];
          $fileUpload = $_POST['fileUpload'];
          $sql = "INSERT INTO jobs (type_of_job, town, employer, seniority_level, startDate, endDate, region, subject_of_job, grade, requirements, description_of_job) VALUES ('$type_of_job', '$town', '$employer', '$seniority_level', '$startDate', '$endDate', '$region', '$subject', '$grade','$requirements', '$description_of_job')";
          $result = mysqli_query($db, $sql);
          if($result){}
          else{
              echo 'You have not successfully created a job post!';
          }
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