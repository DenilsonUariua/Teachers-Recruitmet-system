<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>

<body>
    <?php
    // Path: displayJobApplications.php
    // connect to db
    $conn = mysqli_connect("localhost", "root", "", "test");
    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // if button is clicked submit file to db
    if (isset($_POST['submit'])) {
    //  upload file to db which is in the form of a blob
    $generateUniqueID = uniqid();
    $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $imageProperties = getimageSize($_FILES['image']['tmp_name']);
    // create images table if it does not exist
    $sqlCreate = "CREATE TABLE IF NOT EXISTS images (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        imageType VARCHAR(50) NOT NULL,
        imageData BLOB NOT NULL,
        imageId INT(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        //execute the query
      $conn->query($sqlCreate);

    $sql = "INSERT INTO images (imageType, imageData, imageId) 
    VALUES ('{$imageProperties['mime']}', '{$imageData}', '{$generateUniqueID}')";
        
    if (mysqli_query($conn, $sql)) {
        // echo "New record created successfully";
        // move the resume to the uploads folder
        // move_uploaded_file($resume_tmp, "uploads/$resume");
        echo "<script>alert('Your application has been submitted successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    }
    ?>
    <!-- a form that submits a file to the db -->
    <form action="displayJobApplications.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">UPLOAD</button>
    </form>
</body>

</html>