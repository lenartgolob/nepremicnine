<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "database.php";
include_once "session.php";


$posredovanje = $_POST['posredovanje'];
$ime = $_POST['ime'];
$vrsta = $_POST['vrsta'];
$tip = $_POST['tip'];
$naslov = $_POST['naslov'];
$kraj = $_POST['kraj'];
$drzava = $_POST['drzava'];
$lokacija = $_POST['lokacija'];
$telefon = $_POST['telefon'];
$velikost = $_POST['velikost'];
$parcela = $_POST['parcela'];
$cena = $_POST['cena'];
$opis1 = $_POST['opis1'];
$opis2 = $_POST['opis2'];
$uporabnik_id = $_SESSION['user_id'];

$query = "INSERT INTO nepremicnine (ime, opis1, opis2, naslov, posredovanje, vrsta, tip, lokacija, telefon, velikost, parcela, cena, uporabnik_id, kraj_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $opis1, $opis2, $naslov, $posredovanje, $vrsta, $tip, $lokacija, $telefon, $velikost, $parcela, $cena, $uporabnik_id, $kraj]);


header("Location: slike_form.php");





?>