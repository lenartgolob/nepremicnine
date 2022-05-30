<?php
include_once 'session.php';
include_once 'database.php';

$id = $_GET['id'];
$n_id = $_GET['n_id'];

$query = "DELETE FROM komentarji WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: nepremicnina.php?id=$n_id#comments");
?>