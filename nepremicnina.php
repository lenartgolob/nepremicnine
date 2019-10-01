<?php
include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nepremicnine.net</title>

  <link rel="stylesheet" type="text/css" href="css/style.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
include_once "header.php";
?>

<br><br><br><br><br><br><br><br>

<?php

// Iz DB dobimo vse podatke o nepremicni na katero smo pritisnili
$n_id = $_GET['id'];
$query = "SELECT n.*, s.slika, k.posta, k.ime AS ime_kraja, u.ime AS uporabnik_ime, u.priimek, u.email FROM nepremicnine n INNER JOIN uporabniki u ON u.id = n.uporabnik_id INNER JOIN kraji k ON k.id = n.kraj_id INNER JOIN slike s ON n.id = s.nepremicnina_id WHERE n.id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$n_id]);
$row = $stmt->fetch();

switch ($row['posredovanje']) {
    case "Prodaja":
        $text = 'Naprodaj je ' . $row['tip'] . ' , ki je velika ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se na naslovu ' . $row['naslov'] . ', parcela pa je velika ' . $row['parcela'] . ' m<sup>2</sup>, ki je na voljo za ' . $row['cena'] . ' €';
        break;
    case "Nakup":
        $text = 'Za nakup se išče ' . $row['tip'] . ' , ki je velika okoli ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se v okolici ' . $row['naslov'] . ', parcela pa je velika okoli ' . $row['parcela'] . ' m<sup>2</sup>, znesek, ki ga ponujam je ' . $row['cena'] . ' €. Spodnja slika je simbolična oz. približek željene nepremičnine.';
        break;
    case "Oddaja":
    $text = 'Oddaja se ' . $row['tip'] . ' , ki je velika ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se na naslovu ' . $row['naslov'] . ', parcela pa je velika ' . $row['parcela'] . ' m<sup>2</sup>, ki je na voljo za ' . $row['cena'] . ' € na mesec.';
        break;
    case "Najem":
    $text = 'Za najem se išče ' . $row['tip'] . ' , ki je velika okoli ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se v okolici ' . $row['naslov'] . ', parcela pa je velika okoli ' . $row['parcela'] . ' m<sup>2</sup>, znesek, ki ga ponujam je  ' . $row['cena'] . ' € na mesec. Spodnja slika je simbolična oz. približek željene nepremičnine.';
        break;
}
?>

<div class="container">

<?php

// Izpisovanje podatkov iz DB
echo '<h4 class="font-weight-normal"> ' . $row['ime'] . '</h4>';
echo '<h6 class="text-muted font-weight-light"> ' . $row['ime_kraja'] . ', ' . $row['lokacija'] . '</h6><br>';
echo '<p>' . $text . '</p><br>';
echo '<div class="text-center">';
// IZ DB dobimo vse slike
$query = "SELECT s.slika FROM slike s WHERE s.nepremicnina_id = ? ORDER BY id ASC";
$stmt = $pdo->prepare($query);
$stmt->execute([$n_id]);
echo '<div class="galerija text-center">';
echo '<div id="carouselExampleControls" class="carousel slide slika60 slika69" data-ride="carousel">';
echo '<div class="carousel-inner">';
$active = "active";
while ($row = $stmt->fetch()) {
    echo '<div class="carousel-item ' . $active . '">';
    $active = "";
    echo '<img class="slika60 d-block w-100" alt="slika" src="data:;base64,' . base64_encode($row['slika']) .'">';
    echo '</div>';
}
?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<?php
$query = "SELECT n.*, s.slika, k.posta, k.ime AS ime_kraja, u.ime AS uporabnik_ime, u.priimek, u.email FROM nepremicnine n INNER JOIN uporabniki u ON u.id = n.uporabnik_id INNER JOIN kraji k ON k.id = n.kraj_id INNER JOIN slike s ON n.id = s.nepremicnina_id WHERE n.id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$n_id]);
$row = $stmt->fetch();

//echo '<img class="slika60" src="data:;base64,' . base64_encode($row['slika']) .'">';
echo '</div><br><br>';
echo '<p>' . $row['opis1'] .'</p>';
echo '<p>' . $row['opis2'] .'</p><br>';
echo '<p class="font-weight-bold">Ponudnik in kontakt:</p>';
echo '<ul>';
echo '<li>' . $row['uporabnik_ime'] . ' ' . $row['priimek'] . '</li>';
echo '<li>' . $row['telefon'] . '</li>';
echo '<li>' . $row['email'] . '</li><br><br>';

?>


<?php
include_once "footer.php";
?>
</body>

</html>