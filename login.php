<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
  </head>
  <body>
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="index.html"
          ><img
            src="./images/eduhirelogo.png"
            width="45"
            height="43"
            alt="logo"
          />
          NamEduHire</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Find a Job</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Post a Job</a>
            </li>
          </ul>
          <form class="d-flex">
            <button class="btn0"><a href="/login.html">Sign Up</a></button>
            <button class="btn1">Login</button>
          </form>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->
    <div class="card align-middle" style="margin: 5rem; background: #f8f9fa">
      <div class="card-body d-flex justify-content-center">
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"
              >Email address</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputEmail1"
              name="username"
              aria-describedby="emailHelp"
            />
            <div id="emailHelp" class="form-text">
              We'll never share your email with anyone else.
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
            />
          </div>
          <div class="mb-3 form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="exampleCheck1"
            />
            <label class="form-check-label" for="exampleCheck1"
              >Check me out</label
            >
          </div>

          <?php 
//connect to database
//create variables for the database connection
$host = 'localhost';
$database = 'teachers-recruitment';
$user = 'root';
$password = '';

//create a connection to the database
$db = mysqli_connect($host, $user, $password, $database);
//check if the connection failed
if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: '.mysqli_connect_error();
    die();
}
else{
    echo 'Database connection successful!';
}

if(array_key_exists('submit', $_POST)) {
    submit();
}
//submit function that will run when the user submits the form
function submit(){
    echo "This is Button1 that is selected";
    global $db;
    console_log('submit');

    //create variables for the form data
    $email = $_POST['username'];
    $password = $_POST['password'];
    //create a query
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    //run the query
    $result = mysqli_query($db, $sql);
    //check if the query failed
    if(!$result){
        echo 'Query failed!';
        die();
    }
    //check if any rows were returned
    if(mysqli_num_rows($result)>0){
      //navigate to the home page
      header('location: index.html');
      
        echo 'You are logged in!';
    }
    else{
        echo 'Wrong credentials!';
    }
}


function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
 ?>
          <!-- when the user submits run submit function -->
            <button
                type="submit"
                name="submit"
                class="btn btn-primary"
                >Submit</button >
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        </form>
      </div>
    </div>
  </body>
</html>
