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
  <script src="js/comments.js"></script>

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


  <div id="comments" style="width: 100% !important;"  class="container my-5 py-5">
    <div style="width: 100% !important;" class="row d-flex justify-content-center">
      <div style="width: 100% !important;" class="col-md-15 col-lg-15">
        <div class="card text-dark">
          <div class="card-body p-4">
          <h4 class="mb-0">Komentarji</h4>
            <p style="margin-bottom: 0 !important;" class="fw-light mb-4 pb-2">Najnovejši komentarji</p>
          </div>

          <hr class="my-0" />

          <?php
    
    $query = "SELECT * FROM `komentarji` WHERE nepremicnina_id = ? ORDER BY datum DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_GET['id']]);
    //izvedlo se bo tolikokrat, koliko je vrstic rezultata
    //trenutno vrstico shrani v spremenljivko $row
    $st = 0;
    while ($row = $stmt->fetch()) {
      if($st == 3) {
        if(!isset($_GET['comments'])) {
          break;
        }
      }
        $u_id = $row['uporabnik_id'];
        $query2 = "SELECT u.ime, u.priimek FROM uporabniki u WHERE u.id = ? LIMIT 1";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$u_id]);
        $row2 = $stmt2->fetch();
        $user = $row2['ime'] . ' ' . $row2['priimek'];
        ?>
        <div class="card-body p-4">
          <div class="d-flex flex-start">
            <img class="rounded-circle shadow-1-strong me-3" src="./img/team/profile.png" alt="avatar" width="45" height="40" />
            <div style="width: 100% !important;">
              <h6 class="fw-bold mb-1"><?php echo $user ?> </h6>
              <div class="d-flex align-items-center justify-content-between mb-3">
                <p class="mb-0"><?php echo $row['datum'] ?></p>
                <?php
                  if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $row['uporabnik_id'] || (isset($_SESSION['tip']) && $_SESSION['tip'] == "admin"))) {
                ?>
                <div>
                  <i style="cursor: pointer; color: #fed136;" onclick="editComment(<?php echo $row['id'] ?>)" class="fas fa-pencil-alt ms-2"></i>
                  <i style="cursor: pointer; color: #fed136;" onclick="deleteComment(<?php echo $row['id'] ?>, <?php echo $_GET['id'] ?>)" class="fa fa-trash ms-2" aria-hidden="true"></i>
                </div>
                <?php
                  }
                ?>
              </div>
              <p id="<?php echo 'comm' . $row['id'] ?>" class="mb-0"><?php echo $row['komentar'] ?></p>
              <?php echo '<div style="display: none;" id="editComm' . $row['id'] . '" >' ?>
                <form method="POST" action="komentar_update.php" >
                  <textarea class="form-control" name="komentar" required><?php echo $row['komentar'] ?></textarea>
                  <input type="hidden" value="<?php echo $row["id"] ?>" name="id" />
                  <input type="hidden" value="<?php echo $_GET["id"] ?>" name="n_id" />
                  <button style="margin-top: 10px; float: right;" name="sbmt" type="submit" class="btn btn-primary">Objavi</button>
              </form>
            </div>
            </div>
          </div>
        </div>
        <hr class="my-0" />
        <?php
        $st++;
    }
    ?>
<!-- 
          <div class="card-body p-4">

            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="./img/team/profile.png" alt="avatar" width="60"
                height="40" />
              <div>
                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 07, 2021
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of type and
                  scrambled it.
                </p>
              </div>
            </div>
          </div> -->

          <hr class="my-0" />

          <div class="card-body p-4">
            <?php
              if(isset($_GET['comments'])) {
            ?>
              <a href=<?php echo "nepremicnina.php?id=" . $_GET['id'] . "#comments"  ?>><p style="margin-bottom: 0;">Skrij komentarje</p></a>
            <?php
              } else {
            ?>
              <a href=<?php echo "nepremicnina.php?id=" . $_GET['id'] . "&comments=all#comments" ?>><p style="margin-bottom: 0;">Prikaži vse komentarje</p></a>
            <?php    
              }
            ?>
          </div>

          <hr class="my-0" />
          <?php if(isset($_SESSION['user_id'])) { ?>
          <div class="card-body p-4">
            <p>Napiši komentar:</p>
            <form method="POST" action="komentar_insert.php" >
              <textarea class="form-control" name="komentar" required> </textarea>
              <input type="hidden" value="<?php echo $_GET["id"] ?>" name="nepremicnina_id" />
              <button style="margin-top: 10px; float: right;" name="sbmt" type="submit" class="btn btn-primary">Objavi</button>
            </form>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

<?php
include_once "footer.php";
?>
</body>

</html>