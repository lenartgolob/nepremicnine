<?php
session_start();
include_once "database.php";
$email = $_POST['email'];
$pass = $_POST['pass'];
//preverim, če sem prejel podatke
    //$pass = sha1($pass.$salt);
    
    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($pass, $user['geslo'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['ime'] = $user['ime'];  
            $_SESSION['priimek'] = $user['priimek']; 
            $_SESSION['email'] = $user['email'];  
            $_SESSION['telefon'] = $user['telefon'];           
            $_SESSION['tip'] = $user['tip'];        
            header("Location: index.php");
            die();
        }
        header("Location: login.php?msg=wrongpass");
    }

header("Location: login.php?msg=wrongpass");
?>