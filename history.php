<?php
    require_once('./php/config.inc.php');

    $sql = "SELECT * FROM companies WHERE symbol = :symbol";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":symbol", $_GET["symbol"]);$statement -> execute();
    $company = $statement->fetch(PDO::FETCH_ASSOC);


    $sql = "SELECT * FROM history WHERE symbol = :symbol";
    if(isset($_GET["sort"])){
        $sql .= " ORDER BY ".$_GET["sort"]." ASC";
    }else{
        $sql .= " ORDER BY date ASC";
    }
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":symbol", $_GET["symbol"]);$statement -> execute();
    $history = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stock Browser</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Our style sheet  -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- Top Navigation Menu -->
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="list.php">Companies</a>
            </a>
        </div>

        <div style="background-color:#e5e5e5;padding:10px;text-align:center;">
            <h1>Company History</h1>
        </div>
    <!--shows the tables of values for date, open, close, high, low and volume -->
    <div style="overflow:auto">
        <div class="single-main">
            <img style="object-fit:cover;height:70px;width:auto;padding:2px;" src="img/logos/<?=$company["symbol"].'.svg'?>">
        </div>

        <div class="single-main">
            <h1><?=$company["name"]?></h1>
        </div>

        <table class="table-single">
            <thead>
                <tr>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=date">Date</a></th>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=open">Open</a></th>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=high">High</a></th>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=low">Low</a></th>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=close">Close</a></th>
                    <th><a href="history.php?symbol=<?=$company["symbol"]?>&sort=volume">Volume</a></th>
                </tr>
                <?php
                foreach ($history as $key => $value) {
                ?>
                <tr>
                    <td><?=$value["date"]?></th>
                    <td><?=$value["open"]?></th>
                    <td><?=$value["high"]?></th>
                    <td><?=$value["low"]?></th>
                    <td><?=$value["close"]?></th>
                    <td><?=$value["volume"]?></th>
                </tr>
                <?php
                }
                ?>
                
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    </body>
</html>