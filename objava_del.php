<?php
include_once 'session.php';
include_once 'database.php';

$nepremicnina_id = $_GET['id'];

$query = "DELETE FROM nepremicnine WHERE id = ? AND uporabnik_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$nepremicnina_id,$_SESSION['user_id']]);

$query = "DELETE FROM slike WHERE nepremicnina_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$nepremicnina_id]);

header("Location: myobjave.php");
?>