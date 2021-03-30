<?php require_once('config.inc.php'); ?>
<!DOCTYPE html>
<html>
    <body>
        <h1>Database Tester (PDO)</h1> 
        <?php
            try {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS); 
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $sql = "";
                $result = $pdo->query($sql);
                
                // loop through the data
                while ($row = $result->fetch()) {
                    echo $row[''] . " - " . $row[''] . "<br/>"; 
                }
                $pdo = null; 
            }
            catch (PDOException $e) {
                die( $e->getMessage()); 
            }
        ?>
   </body>
</html>