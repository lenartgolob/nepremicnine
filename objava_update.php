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
$lokacija = $_POST['lokacija'];
$telefon = $_POST['telefon'];
$velikost = $_POST['velikost'];
$parcela = $_POST['parcela'];
$opis1 = $_POST['opis1'];
$opis2 = $_POST['opis2'];
$uporabnik_id = $_SESSION['user_id'];

$n_id = $_GET['id'];
$_SESSION['nepremicnina'] = $ime;
$_SESSION['opis'] = $opis1;

$query = "UPDATE nepremicnine SET ime=?, opis1=?, opis2=?, naslov=?, posredovanje=?, vrsta=?, tip=?, lokacija=?, telefon=?, velikost=?, parcela=?, kraj_id=? WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $opis1, $opis2, $naslov, $posredovanje, $vrsta, $tip, $lokacija, $telefon, $velikost, $parcela, $kraj, $n_id]);


/*
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$data = file_get_contents($_FILES['myfile']['tmp_name']);

$query = "INSERT INTO slike (ime, tip, slika) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$name, $type, $data]);
*/
header("Location: slike_update.php?id=$n_id");





?>