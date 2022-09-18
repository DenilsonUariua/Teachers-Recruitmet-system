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
    <title> NamEduHire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sriracha&display=swap" rel="stylesheet">
    <!--Link HTML and CSS file-->
    <link rel="stylesheet" href="./style.css">
    <title>About Us</title>
</head>

<body>
    <!-- About us page with a navbar and body container containing text -->
    <!-- start of navbar -->
   <!-- PHP code to import the header/navbar -->
   <?php
        include_once 'header.php'; 
    ?>
    <!-- end of navbar -->
    <!-- start of body containing title and paragraph text  -->
    <div class="p-5"></div>
    <div class="container text-center bg-white rounded ">
        <div class="row">
            <div class="col">
                <div class="card my-3 shadow-lg" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">We have digitized the recruitment process
                            for teachers in Namibia. To improve the recruitment process
                            for teachers by making vacancies more accessible and for schools
                            to attract more applicants while saving advertising costs.</p>
                        <a href="registration.php" class="btn btn-danger">Sign Up Now</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card my-3 shadow-lg" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Job Seekers</h5>
                        <p class="card-text">Whether you're just starting out or experienced,
                            NamEduHire is the best place to manage your education career.
                            Access thousands of job openings nationwide in a single,
                            easy-to-search engine. And that's just the beginning </p>
                        <a href="findJob.php" class="btn btn-danger">Find a Job ></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card my-3 shadow-lg" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Employers</h5>
                        <p class="card-text">Find teachers, administrators, support
                            staff and other education professionals for your school.
                            Attract more applicants even those hard-to-fill positions,
                            while saving money spent on career fairs and advertising.
                        </p>
                        <a href="jobPost.php" class="btn btn-danger">Post a Job ></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5"></div>
     <!-- start of footer -->
        <!-- PHP code to import the header/navbar -->
    <?php
        include_once 'footer.php'; 
    ?>
    <!-- end of footer -->
</body>

</html>