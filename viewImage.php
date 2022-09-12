<?php 
    // connect to db
    $conn = mysqli_connect("localhost", "root", "", "test");
    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_GET['image_id'])) {
        $imageId = $_GET['image_id'];
        $sql = "SELECT * FROM images WHERE id = '$imageId'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
    }
?>