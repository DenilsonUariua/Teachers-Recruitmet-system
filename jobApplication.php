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
    <title>Apply for Job</title>
</head>

<body>
    <!-- start of navbar -->
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
                        <a class="nav-link" href="jobPost.php">Post a Job</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
    <div class="p-3"></div>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <h1>Job Application</h1>
                <form action="jobApplication.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Enter your address">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position"
                            placeholder="Enter the position you are applying for">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Company</label>
                        <input type="text" class="form-control" id="position" name="company"
                            placeholder="Enter the company you are applying for">
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume"
                            placeholder="Upload your resume">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="p-3"></div>

    <!-- php code to handle job application -->
    <?php 
            // connect to the database
            $conn = mysqli_connect("localhost", "root", "", "test");
            // check if the connection was successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
             // create job application table if it does not exist
            $sql = "CREATE TABLE IF NOT EXISTS jobApplication (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone VARCHAR(30) NOT NULL,
                address VARCHAR(50) NOT NULL,
                position VARCHAR(50) NOT NULL,
                company VARCHAR(50) NOT NULL,
                resume VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

            if (mysqli_query($conn, $sql)) {
                // echo "Table jobApplication created successfully";
            } else {
                echo "Error creating table: " . mysqli_error($conn);
            }
            // check if the submit button was clicked
            if (isset($_POST['submit'])) {
                // get the form data
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $position = $_POST['position'];
                $company = $_POST['company'];
                $resume = $_FILES['resume']['name'];
                $resume_tmp = $_FILES['resume']['tmp_name'];
                // only allow pdf files
                $file_ext = strtolower(end(explode('.', $resume)));
                $extensions = array("pdf");
                if (in_array($file_ext, $extensions) === false) {
                    echo "<script>alert('Only PDF files are allowed')</script>";
                } else {
                    // insert the data into the database
                    $sql = "INSERT INTO jobApplication (name, email, phone, address, position, company, resume) VALUES ('$name', '$email', '$phone', '$address', '$position', '$company', '$resume')";
                    if (mysqli_query($conn, $sql)) {
                        // echo "New record created successfully";
                        // move the resume to the uploads folder
                        move_uploaded_file($resume_tmp, "uploads/$resume");
                        echo "<script>alert('Your application has been submitted successfully')</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
        ?>
</body>

</html>