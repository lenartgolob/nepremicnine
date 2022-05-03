<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "database.php";
include_once "session.php";

$komentar = $_POST['komentar'];
// $datum = date('m/d/Y h:i:s a', time());
$uporabnik_id = $_SESSION['user_id'];
$nepremicnina_id = $_POST['nepremicnina_id'];

$query = "INSERT INTO komentarji (komentar, uporabnik_id, nepremicnina_id) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$komentar, $uporabnik_id, $nepremicnina_id]);

header("Location: nepremicnina.php? id=" . $nepremicnina_id);
?>