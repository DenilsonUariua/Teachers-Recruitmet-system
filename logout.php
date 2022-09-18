<?php 
    // log the user out of the session
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
?>