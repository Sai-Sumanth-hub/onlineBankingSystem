<?php 

session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location:home-page.php");
} 

?>