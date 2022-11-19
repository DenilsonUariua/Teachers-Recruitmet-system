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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <title> NamEduJobs</title>
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
    include_once 'createUsersTables.php';
    include_once 'createJobsTable.php';
    include_once 'createJobApplicationTable.php';
    ?>
    <div class="m-5"></div>
    <div class="container text-center">
        <div class="title-container d-flex justify-content-center">
            <div class="title-image">
                <img src="./images/eduhirelogo.png" alt="logo" height="100px" width="100px">
            </div>
            <div class="title">
                <h1 style="font-size: 70px;">NamEduJobs</h1>
            </div>
        </div>
        <div class="m-3"></div>
        <div class="subtitle-container">
            <div class="subtitle">
                <h2 style="font-size: 30px;">Welcome to the teachers job portal</h2>
            </div>
        </div>
    </div>
    <div class="m-5"></div>

    <!-- start of how it works section -->
    <div class="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center">How It Works</h1>
                </div>
            </div>
            <div class="paragraph-container text-center">
                <p>Follow these three simple steps to find jobs in Education today</p>
            </div>
            <div class="row py-4">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="2000">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image-container m-4 d-flex justify-content-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg></div>

                                        <h5 class="text-center">Create an account</h5>
                                        <p class="text-center">To have easy access to login, search and find any
                                            available jobs
                                            anywhere in Namibia.</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image-container m-4 d-flex justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg></div>
                                        <h5 class="text-center">Search for Jobs</h5>
                                        <p class="text-center">Search for teaching jobs in all regions, subjects and
                                            grades all over
                                            Namibia.</p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image-container m-4 d-flex justify-content-center"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16">
                                                <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935z" />
                                            </svg></div>
                                        <h5 class="text-center">Apply</h5>
                                        <p class="text-center">Apply for your dream teaching job with ease and quickly
                                            match with
                                            the right school.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of how it works section -->



    <div class="m-5"></div>
    <div class="m-5"></div>
    <div class="m-5"></div>
    <!-- include the footer -->
    <?php include_once 'footer.php'; ?>
</body>

</html>