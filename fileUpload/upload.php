<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>

    <!-- button to go to display page -->
    <form action="displayFiles.php" method="post">
        <input type="submit" name="submit" value="Display Files">
    </form>
    <?php
    // Include the database configuration file called: dbConfig.php
    include 'dbConfig.php';
    $statusMsg = '';

    if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
        // create uploads folder if it doesn't exist
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }
        
        // File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        //create images table if not exists
        $sql = "CREATE TABLE `images` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
                    `uploaded_on` datetime NOT NULL,
                    `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
                    PRIMARY KEY (`id`)
                   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $result = mysqli_query($db, $sql);
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
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
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }

    // Display status message
    echo $statusMsg;
    ?>
</body>

</html>