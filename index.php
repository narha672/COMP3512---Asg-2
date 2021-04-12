<?php
//main page 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>index</title>
        <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
        <link rel="stylesheet" href="./css/index.css"/>
        <script src="./js/index.js"></script>
    </head>
    <body>
        <header>
            <a href="./index.php">Logo</a>
            <span id="hamburger-button"></span>
        </header>
        <div id="hamburger-menu">
            <span><a>Login</a></span>
            <span><a>Logout</a></span>
            <span><a>Credits</a></span>
        </div>

        <div class="container">
            <div id="welcome-banner" class="banner">
                <h2>Welcome!</h3>
                <p class="large">Want to keep track of your favourite companies?</p>
                <a href="./index.php" class="button-label">Register Now</a>
                <p class="small">Already have an account? Log in!</p>
            </div>
            <div id="companies-banner" class="banner">
                <h2>Welcome!</h2>
                <span class="button-label">Register</span>
            </div>
            <div id="about-banner" class="banner">
                <h2>Welcome!</h2>
                <span class="button-label">Register</span>
            </div>

        </div>
    </body>
</html>

