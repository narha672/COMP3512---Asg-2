<?php require_once('./php/config.inc.php');
session_start();
try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fav = [];
    if (isset($_SESSION["favourites"])) {
        $fav = $_SESSION["favourites"];
    }

    $sql = 'SELECT name, symbol FROM companies WHERE symbol IN (';
    for ($i = 0; $i < count($fav); $i++) {
        $sql = $sql . "'{$fav[$i]}', ";
        // if (array_key_exists($i + 1, $fav))
        //     echo ", ";
    }
    $sql = $sql . "'') ORDER BY symbol";

    $result = $pdo -> query($sql);
    $companies = $result -> fetchAll();
    $pdo = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<DOCTYPE html>
<html>
    <head>
        <title>favourites</title>
        <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
        <link rel="stylesheet" href="./css/favourites.css"/>
        <script src="./js/index.js"></script>
    </head>
        <header>
            <a href="./index.php">Logo</a>
            <span id="hamburger-button"></span>
        </header>
        <div id="hamburger-menu" style="display: none;">
            <span><a>Login</a></span>
            <span><a>Logout</a></span>
            <span><a>Credits</a></span>
        </div>

        <div id="main">
            <h2>Favourites</h2>
            <?php
            if (count($fav) < 1) {
                // display if no favourites exist
                if (isset($_SESSION["is_user_logged_in"]) && $_SESSION["is_user_logged_in"]) {
                    echo '<div>
                            <h3>Looks like you have no favourites!</h3>
                            <p>In the favourites list, you can access the data for companies you want to keep track of. To add companies to your favourites,</p>
                            <a href="list.php">Access our list of companies</a>';
                } else {
                    //display if not logged in
                }
            } else {
                foreach ($companies as $key => $value) {
                    $sym = $value["symbol"];
                    $name = $value["name"];

                    echo '<div class="container fav-card" id="' . $sym . '">';
                    echo    '<img src="./img/logos/' . $sym . '.svg">';
                    echo    '<div class="fav-info">';
                    echo        '<h3 class="fav-name">' . $name . '</h3>';
                    echo        '<p class="fav-symbol">' . $sym . '</p>';
                    echo    '</div>';
                    echo    '<a href="./removeFromFavourites.php?symbol='. $sym .'" class="remove-button"></a>';
                    echo '</div>';
                }
                // Remove All Button
                echo '<a href="./removeFromFavourites.php?all=y" id="remove-all-button"></a>';

            }
            ?>
        </div>

    <body>
    </body>
</html>