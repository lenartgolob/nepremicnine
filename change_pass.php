<?php
include_once 'database.php';
include_once 'session.php';

$id = $_SESSION["user_id"];
$email = $_SESSION['email'];

$oldpass = $_POST ["password_old"];
$newpass1 = $_POST ["newPassword1"];
$newpass2 = $_POST ["newPassword2"];
$pass = password_hash($newpass1, PASSWORD_DEFAULT);

$query = "SELECT * FROM uporabniki WHERE email=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$email]);
$row = $stmt->fetch();


if (password_verify($oldpass, $row['geslo'])) {
        if($newpass1 == $newpass2){

            $query = "UPDATE uporabniki SET geslo = ? WHERE id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$pass, $id]);
 

            header("Location:index.php");

            

        }
        else {
            header("Location: profile.php?msg=razlicni");
        }
    }
    else {
        header("Location: profile.php?msg=wrong_pass");
   
    }
 

