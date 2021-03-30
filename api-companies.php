<?php require_once('config.inc.php');

try {
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $companies = [];

    if (isset($_GET["symbol"])) {
        $sql = "SELECT * FROM companies WHERE symbol = :symbol";
        $statement = $pdo -> prepare($sql);
        $statement -> bindValue(":symbol", $_GET["symbol"]);$statement -> execute();
        $companies = $statement -> fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT * FROM companies";
        $result = $pdo->query($sql);
        $companies = $result -> fetchAll(PDO::FETCH_ASSOC);
    }
    
    echo "[";
    foreach ($companies as $key => $value) {
        echo "{";
        echo '"symbol":"' . $value["symbol"] . '",'; 
        echo '"name":"' . $value["name"] . '",';
        echo '"sector":"' . $value["sector"] . '",';
        echo '"subindustry":"' . $value["subindustry"] . '",';
        echo '"address":"' . $value["address"] . '",';
        echo '"exchange":"' . $value["exchange"] . '",';
        echo '"website":"' . $value["website"] . '",';
        echo '"description":"' . $value["description"] . '",';
        echo '"latitude":"' . $value["latitude"] . '",';
        echo '"longitude":"' . $value["longitude"] . '",';
        echo '"financials":"' . $value["financials"] . '"';
        echo "}";

        if (array_key_exists($key + 1, $companies))
            echo ",";
    }
    echo "]";
    $pdo = null; 
}
catch (PDOException $e) {
    die( $e->getMessage()); 
}
?>