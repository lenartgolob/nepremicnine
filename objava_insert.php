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
$cena = $_POST['cena'];
$opis1 = $_POST['opis1'];
$opis2 = $_POST['opis2'];
$uporabnik_id = $_SESSION['user_id'];

$query = "INSERT INTO nepremicnine (ime, opis1, opis2, naslov, posredovanje, vrsta, tip, lokacija, telefon, velikost, parcela, cena, uporabnik_id, kraj_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $opis1, $opis2, $naslov, $posredovanje, $vrsta, $tip, $lokacija, $telefon, $velikost, $parcela, $cena, $uporabnik_id, $kraj]);

$query = "SELECT id FROM nepremicnine WHERE ime=? AND opis1=? AND opis2=? AND naslov=? AND posredovanje=? AND vrsta=? AND tip=? AND lokacija=? AND telefon=? AND velikost=? AND parcela=? AND cena=? AND uporabnik_id=? AND kraj_id=? ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->execute([$ime, $opis1, $opis2, $naslov, $posredovanje, $vrsta, $tip, $lokacija, $telefon, $velikost, $parcela, $cena, $uporabnik_id, $kraj]);
$row = $stmt->fetch();
$nepremicnina_id = $row['id'];

$total = count($_FILES['myfile']['name']);

// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) {

  //Get the temp file path
  $tmpFilePath = $_FILES['myfile']['tmp_name'][$i];

  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $name = $_FILES['myfile']['name'][$i];
    $type = $_FILES['myfile']['type'][$i];
    $data = file_get_contents($_FILES['myfile']['tmp_name'][$i]);

    $query = "INSERT INTO slike (ime, tip, slika, nepremicnina_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $type, $data, $nepremicnina_id]);
  }
}




header("Location: index.php");





?>