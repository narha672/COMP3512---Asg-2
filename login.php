<?php
    session_start();
    require_once('./php/config.inc.php');
    // require_once('action.php');
    if(isset($_SESSION[("is_user_logged_in")])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>index</title>
        <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
        <link rel="stylesheet" href="css/index.css"/>
        <script src="js/index.js"></script> 
    </head>
    <body>
        <header>
            <a href="./index.php">Logo</a>
            <span id="hamburger-button"></span>
        </header>
        <div id="hamburger-menu" style="display:none;">
            <span><a href="index.php">Home</a><span>
            <span><a href="list.php">Companies</a><span>
            <span><a>Favourites</a><span>
            <span><a>Login</a></span>
            <span><a>Logout</a></span>
            <span><a>Credits</a></span>
        </div>
        <main>
        </br></br></br></br></br></br></br>
        <!-- taken from w3schools https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_password-->
        <form action="action.php" method="POST" style="background-color:lightgrey;text-align:center; border-style: solid; padding: 35px; margin-right:450px;margin-left:450px;">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="pwd">Password:</label>
            <input type="password" id="password" name="password" minlength="8"><br><br>
            <input type="submit">
        </form>

        </main>
    </body>
</html>

