<?php
include_once "database.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$tip = "user";

echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $email;
echo "<br>";
echo $pass1;
echo "<br>";
echo $pass2;
echo "<br>";
echo $tip;


//preverim podatke, da so obvezi vnešeni
if ($pass1 == $pass2) {
    
    $pass = password_hash($pass1, PASSWORD_DEFAULT);

    $query = "INSERT INTO uporabniki (ime, priimek, email, telefon, geslo, tip) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$first_name, $last_name, $email, $phone, $pass, $tip]);

    header("Location: login.php");
    
}
else {
    header("Location: register.php");
}
?>