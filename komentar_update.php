<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "database.php";
include_once "session.php";


$komentar = $_POST['komentar'];
$id = $_POST['id'];
$n_id = $_POST['n_id'];

$query = "UPDATE komentarji SET komentar=? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$komentar, $id]);

header("Location: nepremicnina.php?id=$n_id#comments");





?>