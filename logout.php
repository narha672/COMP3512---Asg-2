<?php
session_start();
if(isset($_SESSION["is_user_logged_in"])){
    $_SESSION["is_user_logged_in"] = false; 
    header("location: index.php");
    session_destroy();
    exit();
}
?>