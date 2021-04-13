<?php
    require_once('./php/config.inc.php');
    $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (checkUserLogin($pdo)){
        session_start();
        $_SESSION[("is_user_logged_in")] = true;
        header("location: index.php");
        exit();
    }else{
        header("location: login.php");
        exit();
    }
    
    function checkUserLogin($pdo){
        if(!isset($_POST['email'])){
            return false; 
        }
        try{
            $sql = "SELECT email, password FROM users WHERE email = :email";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":email", $_POST['email']);$statement -> execute();
            $users = $statement->fetch(PDO::FETCH_ASSOC);

            if(isset($_POST['password'])){
                $userpass = $_POST['password'];
                if ( password_verify($userpass, $users['password'])){
                    return true;
                }
            }
            return false; 
        }
        catch(Exception $exception){
            return false; 
        }

    }
?>