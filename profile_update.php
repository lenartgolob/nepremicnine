<?php
include_once 'database.php';
include_once 'session.php';

$id = $_SESSION["user_id"];

$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];

$query = "UPDATE uporabniki SET ime = ?, priimek = ?, email = ? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $priimek, $email, $id]);

header("Location: Index.php")

?>

