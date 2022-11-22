 <!-- php code to handle job application -->
 <?php
    // connect to the database
    include_once 'dbConfig.php';
    // check if the submit button was clicked
    if (isset($_POST['submit'])) {
        // create uploads folder if it doesn't exist
        if (!file_exists('jobApplications')) {
            mkdir('jobApplications', 0777, true);
        }

        // File upload code
        $targetDir = "jobApplications/";
        $fileName = basename($_FILES["resume"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $resume = $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        // Allow certain file formats
        $allowTypes = array('pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())");
                if ($insert) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $statusMsg = "Error uploading file, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only PDF files are allowed to upload.';
        }
        // get the form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $position = $_POST['position'];
        $school = $_POST['school'];

        // insert the data into the database
        $sql = "INSERT INTO jobApplication (name, email, phone, address, position, school, resume) VALUES ('$name', '$email', '$phone', '$address', '$position', '$school', '$resume')";
        if (mysqli_query($db, $sql)) {
            echo "<script>alert('Your application has been submitted successfully')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
    ?>

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
 <style>
     body {
         background-color: lightgray;
     }

     .form-container {
         box-shadow: 0px 0 14px 0 rgba(0, 0, 0, 0.6);
     }

     .btn-danger {
         border-radius: 0;
     }
 </style>

 <body>
     <!-- start of navbar -->
     <!-- PHP code to import the header/navbar -->
     <?php
        include_once 'header.php';
        ?>
     <!-- end of navbar -->
     <div class="p-1"></div>
     <div class="container d-flex justify-content-center ">
         <div class="row bg-light p-4 form-container">
             <div class="col-md-12 ">
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
                         <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                     </div>
                     <div class="mb-3">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
                     </div>
                     <div class="mb-3">
                         <label for="position" class="form-label">Position</label>
                         <input type="text" class="form-control" id="position" name="position" placeholder="Enter the position you are applying for">
                     </div>
                     <div class="mb-3">
                         <label for="position" class="form-label">School</label>
                         <input type="text" class="form-control" id="position" name="school" placeholder="Enter the school you are applying for">
                     </div>
                     <div class="mb-3">
                         <label for="resume" class="form-label">Resume</label>
                         <input type="file" class="form-control" id="resume" name="resume" placeholder="Upload your resume">
                     </div>
                     <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                 </form>
             </div>
         </div>
     </div>
     <div class="p-3"></div>
     <!-- start of footer -->
     <!-- PHP code to import the header/navbar -->
     <?php
        include_once 'footer.php';
        ?>
     <!-- end of footer -->

 </body>

 </html>