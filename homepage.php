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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <title> NamEduHire</title>
</head>

<body>
    <!-- PHP code to import the header/navbar -->
    <?php
    include_once 'header.php';
    // create images table

    $sqlJobs = "CREATE TABLE IF NOT EXISTS jobs (
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
        fileUpload VARCHAR(255) NOT NULL,
        date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    )";
    //execute the query
    $db->query($sqlJobs);
    ?>
    <!--=====================main section=======================-->
    <section class="main ">
        <div class="container py-2">
            <div class="banner text-center">
                <div class="col-1g-7">
                    <h1> With endless opportunities</h1>
                    <h5> Find you next job in Education today!</h5>
                </div>
            </div>
        </div>
        <!--search bar-->
        <div class="search-job text-center m-2">
            <form method="post" action="jobSearch.php">
                <select class="form-control" aria-label="Default select example" name="region">
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
                <button class="btn2" name="submit">Find Job</button>
            </form>
        </div>
    </section>
    <!--==========================Browse subjects sections====================-->
    <section class="subjects py-3">
        <div class="container-fluid py-5 text-center">
            <p class="red"> <strong>POPULAR SCHOOL SUBJECTS </strong></p>
            <h2>Browse top subject Categories</h2>
            <div class="row ">
                <div class="col-lg-11 m-auto pt-3">
                    <div class="row ">
                        <div class="col-lg-3">
                            <div class="card pt-3">
                                <div class="card-body py-3">
                                    <img src="./images/MathematicsImage.jpg" class="img-fluid my-3 " alt="">
                                    <h6> Mathematics</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Mathematics'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card pt-4">
                                <div class="card-body py-3">
                                    <img src="./images/GeographyImage.png" class="img-fluid my-3 " alt="">
                                    <h6> Geography</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Geography'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/BiologyImage.png" class="img-fluid my-3 " alt="">
                                    <h6>Biology</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Biology'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/PhysicalScienceImage.png" class="img-fluid my-3 " alt="">
                                    <h6> Physical Science</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Physical Science'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-11 m-auto pt-3">
                    <div class="row ">
                        <div class="col-lg-3">
                            <div class="card py-2">
                                <div class="card-body py-4">
                                    <img src="./images/PhysicalEducation.png" class="img-fluid my-3 " alt="">
                                    <h6> Physical Education</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Physical Education'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/LanguagesImage.png" class="img-fluid my-3 " alt="">
                                    <h6> Languages</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Languages'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/ArtsImage.png" class="img-fluid my-3 " alt="">
                                    <h6> Arts </h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Arts'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/ChemistryImage.png" class="img-fluid my-3 " alt="">
                                    <h6> Chemistry</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Chemistry'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-11 m-auto pt-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/HistoryImage.png" class="img-fluid my-3 " alt="">
                                    <h6> History</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'History'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/LifeSkillsImage.png" class="img-fluid my-3 " alt="">
                                    <h6>Life Skills</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Life Skills'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/ComputerScience.png" class="img-fluid my-3 " alt="">
                                    <h6> Computer Science</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Computer Science'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card py-3">
                                <div class="card-body">
                                    <img src="./images/Design&Technology.png" class="img-fluid my-3 " alt="">
                                    <h6> Design & Technology</h6>
                                    <h6 class="red">(<?php
                                                        $query = $db->query("SELECT * FROM jobs WHERE subject = 'Design & Technology'");
                                                        // display the number of rows in the result set
                                                        echo $query->num_rows; ?>)</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-lg-5 m-auto">
                            <a href="categories.php"><button class="btn3"> BROWSE MORE CATEGORIES</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- PHP code to import the footer component -->
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>