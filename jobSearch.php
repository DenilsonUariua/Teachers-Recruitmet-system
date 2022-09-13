<?php
    session_start();

    // if the submit button is clicked find all jobs that match the search criteria
    if (isset($_POST['submit'])) {
        $subject = $_POST['subject'];
        $region = $_POST['region'];
        $grade = $_POST['grade'];
        echo $region;
        // connect to the database
        $db = mysqli_connect('localhost', 'root', '', 'test');

        // check is the user is logged in
        if (isset($_SESSION['username'])) {
           // clear the previous search results
           echo '<div class="col-md-4"></div>';
           $query = $db->query("SELECT * FROM jobs WHERE region = '$region' AND subject = '$subject' AND grade = '$grade'");
           // loop through the jobs until all jobs are displayed
           if($query->num_rows > 0){ 
               while($row = $query->fetch_assoc()){
               // display the job in one row
               echo '
                   <div class="col-md-4">
                       <div class="card m-2 bg-light">
                           <div class="card-body">
                               <h5 class="card-title">Job Type: '.$row['type_of_job'].'</h5>
                               <p class="card-text">Description: '.$row['description_of_job'].'</p>
                               <p class="card-text">Town: '.$row['town'].'</p>
                               <p class="card-text">Subject: '.$row['subject'].'</p>
                               <p class="card-text">Grade: '.$row['grade'].'</p>
                               <p class="card-text">Start Date: '.$row['startDate'].'</p>
                               <p class="card-text">End Date: '.$row['endDate'].'</p>
                               <a href="jobApplication.php" class="btn btn-primary">Apply</a>
                           </div>
                       </div>
                   </div>';
               }
           }
           // display message if no jobs are found
           else{
               echo '<div class="col-md-12 text-center"><p class="text-muted">No jobs found!</p></div>';
           }
        }
      
    }
?>