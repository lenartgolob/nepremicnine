<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "database.php";
include_once "session.php";


$posredovanje = $_POST['posredovanje'];
$ime = $_POST['ime'];
$vrsta = $_POST['vrsta'];
$naslov = $_POST['naslov'];
$kraj = $_POST['kraj'];
$drzava = $_POST['drzava'];
$lokacija = $_POST['lokacija'];
$telefon = $_POST['telefon'];
$parcela = $_POST['parcela'];
$opis1 = $_POST['opis1'];
$opis2 = $_POST['opis2'];
$img = $_POST['img'];
$uporabnik_id = $_SESSION['user_id'];


$query = "INSERT INTO nepremicnine (ime, opis1, opis2, naslov, posredovanje, vrsta, lokacija, telefon, parcela, uporabnik_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $opis1, $opis2, $naslov, $posredovanje, $vrsta, $lokacija, $telefon, $parcela, $uporabnik_id]);

header("Location: index.php");




?>