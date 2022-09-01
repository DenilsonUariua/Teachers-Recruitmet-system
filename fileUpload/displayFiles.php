<?php
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
        $pdfImgUrl = 'uploads/pdf.png';
        $fileType = pathinfo($imageURL,PATHINFO_EXTENSION);

?>
    <img src="<?php echo $imageURL; ?>" alt="" style='width: 200px; height: 200px;'/>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>