<?php require_once('./php/config.inc.php');
session_start();

if ($_SESSION["is_user_logged_in"]) {
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* https://intellipaat.com/community/8500/how-do-i-query-sql-for-a-latest-record-date-for-each-user for help with the sql query*/
        $sql = "SELECT p.userid, p.symbol, c.name, p.amount, h.close FROM (portfolio p INNER JOIN ( SELECT symbol, close, MAX(date) as maxDate FROM history GROUP BY symbol ) h ON p.symbol = h.symbol) INNER JOIN companies c ON p.symbol = c.symbol WHERE p.userid = {$_SESSION['uid']} ORDER BY p.symbol";

        $result = $pdo -> query($sql);
        $portfolio = $result -> fetchAll();
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>
<DOCTYPE html>
<html lang="eng">
    <head>
        <title>portfolio</title>
        <meta charset="utf-8" content="width=device-width, initial-scale=1" name="viewport"/>
        <link rel="stylesheet" href="./css/portfolio.css"/>
        <script src="./js/index.js"></script>
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

        <div id="main">
            <h2>Portfolio</h2>
            <?php
                if ($_SESSION["is_user_logged_in"]) {
                    foreach ($portfolio as $key => $value) {
                        $total = $value['close'] * $value['amount'];
                        echo "<div class='container port-card' id='{$value['symbol']}'>
                            <img src='./img/logos/{$value['symbol']}.svg'>
                            <div class='port-comp-info'>
                                <a href='single-company.php?symbol={$value['symbol']}'>
                                    <h3>{$value['name']}</h3>
                                    <span>{$value['symbol']}</span>
                                </a>
                            </div>
                            <table class='port-table'>
                                <tr>
                                    <th>Shares Owned</th>
                                    <th>Stock Close</th>
                                </tr>
                                <tr>
                                    <td>{$value['amount']}</td>
                                    <td>{$value['close']}</td>
                                </tr>
                                <tr>
                                    <th colspan='2'>Total Value</th>
                                </tr>
                                <tr>
                                    <td colspan='2'>{$total}</td>
                            </table>
                        </div>";
                    }
                }
            ?>
        </div>
    </body>
</html>