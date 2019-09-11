<?php
session_start();
include_once './database.php';
$email = $_POST['email'];
$pass = $_POST['pass'];
//preverim, če sem prejel podatke
if (!empty($email) && !empty($pass)) {
    //$pass = sha1($pass.$salt);
    
    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();
        if (password_verify($pass, $uporabniki['geslo'])) {
            $_SESSION['user_id'] = $user['id'];        
            $_SESSION['admin'] = $user['admin'];        
            header("Location: index.php");
            die();
        }
    }
}
header("Location: login.php");
?>