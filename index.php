<?php
    session_start();
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

        <div class="container" id="main-container">
            <div id="welcome-banner" class="banner">
                <h2>Welcome!</h3>
                <p class="large" style="margin: 10px;">Want to keep track of your favourite companies?</p>
                <?php
                    if(isset($_SESSION[("is_user_logged_in")])){
                        echo "<a href='favourites.php' class='button-label'>Favourites</a>";
                        echo "<p class='small'>All your favorite companies in one place</p>";
                        echo "</br></br>";
                        echo "<a href= 'profile.php' class= 'button-label'>Profile</a>";
                        echo "</br></br>";
                        echo "<a href= 'portfolio.php' class= 'button-label'>Portfolio</a>";
                        echo "</br></br>";
                        echo "<a href= 'logout.php' class= 'button-label'>Logout</a>";
                    }
                    else{
                        echo "<a href='registration.php' class='button-label'>Register</a>";
                        echo "<p class='small'>Already have an account? Log in!</p>";
                        echo "<a href= 'login.php' class= 'button-label'>Login</a>"; 
                    }
                ?>
            </div>
            <div id="companies-banner" class="container">
                <a href="./list.php" class="button-label banner-button"></a>
                <div>
                    <h3>Company Search</h3>
                    <p>Investigate companies' stock information!</p>
                </div>
            </div>
            <div id="about-banner" class="container">
                <div>
                    <h3>About Us!</h3>
                    <p>To learn more about how the project was created, go to about us!</p>
                </div>
                <a class="button-label banner-button"></a>
            </div>

        </div>
    </body>
</html>

