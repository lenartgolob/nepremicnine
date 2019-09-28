<?php
include_once 'database.php';
include_once 'session.php';

$id = $_SESSION["user_id"];

$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];

$query = "UPDATE uporabniki SET ime = ?, priimek = ?, email = ?, telefon = ? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $priimek, $email, $telefon, $id]);

header("Location: Index.php")

?>

