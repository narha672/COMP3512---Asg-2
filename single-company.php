<?php
require_once('./php/config.inc.php');

$sql = "SELECT * FROM companies WHERE symbol = :symbol";
$statement = $pdo->prepare($sql);
$statement->bindValue(":symbol", $_GET["symbol"]);$statement -> execute();
$company = $statement->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Stock Browser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Our style sheet  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Top Navigation Menu -->
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Home</a>
        <a href="list.php">Companies</a>
    </div>


    <div style="background-color:#e5e5e5;padding:10px;text-align:center;">
        <h1>Company</h1>
    </div>

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
                <th>Sector</th>
                <td><?=$company["sector"]?></td>
            </tr>
            <tr>
                <th>Sub Industry</th>
                <td><?=$company["subindustry"]?></td>
            </tr>

            <tr>
                <th>Address</th>
                <td><?=$company["address"]?></td>
            </tr>

            <tr>
                <th>Exchange</th>
                <td><?=$company["exchange"]?></td>
            </tr>

            <tr>
                <th>Website</th>
                <td><?=$company["website"]?></td>
            </tr>

            <tr>
                <th>Description</th>
                <td><?=$company["description"]?></td>
            </tr>

            <tr>
                <th>Latitude</th>
                <td><?=$company["latitude"]?></td>
            </tr>

            <tr>
                <th>Longitude</th>
                <td><?=$company["longitude"]?></td>
            </tr>

            <tr>
                <th>Financials</th>
                <td>
                    <?php
                    $arr = json_decode($company["financials"]);
                    if (!is_null($arr)) {
                        for($i = 0; $i < sizeof($arr->years) ; $i++){
                            echo "Financial Year ".$arr->years[$i];
                            echo "<ul>";
                            echo "<li>Revenue: ".$arr->revenue[$i]."</li>";
                            echo "<li>Earnings: ".$arr->earnings[$i]."</li>";
                            echo "<li>Assets: ".$arr->assets[$i]."</li>";
                            echo "<li>Liabilites: ".$arr->liabilities[$i]."</li>";
                            echo "</ul>";
                            echo "<br>";
                        }  
                    } else {
                        echo "<p>No financials to show </p>";
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align:center;">
                    <a href="#">Edit</a>
                    <a href="addToFavourites.php?symbol=<?=$company["symbol"]?>">Add To Favorite</a>
                    <a href="history.php?symbol=<?=$company["symbol"]?>">$ Month</a>
                </th>
            </tr>

        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</body>
</html>