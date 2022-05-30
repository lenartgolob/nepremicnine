<?php 
include_once "session.php";
include_once "database.php";
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
  $objava = "Objavi oglas";
  $linko = "objava_form.php";
}
else {
  $objava = "Prijava";
  $linko = "login.php";
}
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

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


  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Dobrodošli!</div>
        <div id="napis" class="intro-heading text-uppercase">NEPREMIČNINE.NET</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo $linko ?>">
        <?php
          echo $objava;
        ?>
        </a>
      </div>
    </div>
  </header>

<script type="text/javascript">
  function submitform()
  {
      document.forms["myform"].submit();
  }
</script>
  <form id="myform" method="POST" action="searchpage.php">
    <div id="search" class="input-group md-form form-sm form-2 pl-0">
    <input class="form-control my-0 py-1 amber-border" name="search" type="text" placeholder="Search" aria-label="Search">
    <a href="javascript: submitform()"><div  class="input-group-append">
    <span id="lupa" class="input-group-text amber lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
          aria-hidden="true"></i></span>
    </div></a>
  </div> 
  </form>
<script>
    function myFunction() {
      document.getElementById("myForm").submit();
    }
</script>

  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Najnovejše</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>
      </div>
      <div class="row">
        <?php
        // Iz DB izberemo šest najnovejših oglasov in jih prikažemo kot portfolio grid
          $query = "SELECT n.id, n.ime, n.lokacija, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id ORDER BY n.objava DESC LIMIT 6";
          $stmt = $pdo->prepare($query);
          $stmt->execute();

          for ($st = 1; $row = $stmt->fetch(); $st++) {
            $query2 = "SELECT s.slika FROM slike s WHERE nepremicnina_id = ?";
            $stmt2 = $pdo->prepare($query2);
            $stmt2->execute([$row['id']]);
            $row2 = $stmt2->fetch();
        ?>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php echo $st; ?>">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <div class="thumbnail">
            <?php echo '<img class="imgdb2" src="data:;base64,' . base64_encode($row2['slika']) .'">' ?>
            </div>
          </a>
          <div class="portfolio-caption">
            <h4><?php echo $row['ime'] ?></h4>
            <h6 class="text-muted font-weight-light"><?php echo $row['ime_kraja'] . ', ' . $row['lokacija']?></h6>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </div>
  </section>


 <?php
  include_once "footer.php";
 ?>

  <!-- Portfolio Modals -->

  <!-- Modal 1 -->

<?php
  
  // Iz DB dobimo najnovejse nepremicnine
$query = "SELECT n.*, s.slika, k.posta, k.ime AS ime_kraja, u.ime AS uporabnik_ime, u.priimek, u.email FROM nepremicnine n INNER JOIN uporabniki u ON u.id = n.uporabnik_id INNER JOIN kraji k ON k.id = n.kraj_id INNER JOIN slike s ON n.id = s.nepremicnina_id ORDER BY n.objava DESC LIMIT 6";
$stmt = $pdo->prepare($query);
$stmt->execute();
for ($st = 1; $row = $stmt->fetch(); $st++) {
  switch ($row['posredovanje']) {
    case "Prodaja":
        $text = 'Naprodaj je ' . $row['tip'] . ' , ki je velika ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se na naslovu ' . $row['naslov'] . ', parcela pa je velika ' . $row['parcela'] . ' m<sup>2</sup>.';
        break;
    case "Nakup":
        $text = 'Za nakup se išče ' . $row['tip'] . ' , ki je velika okoli ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se v okolici ' . $row['naslov'] . ', parcela pa je velika okoli ' . $row['parcela'] . ' m<sup>2</sup>. Spodnja slika je simbolična oz. približek željene nepremičnine.';
        break;
    case "Oddaja":
    $text = 'Oddaja se ' . $row['tip'] . ' , ki je velika ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se na naslovu ' . $row['naslov'] . ', parcela pa je velika ' . $row['parcela'] . ' m<sup>2</sup>.';
        break;
    case "Najem":
    $text = 'Za najem se išče ' . $row['tip'] . ' , ki je velika okoli ' . $row['velikost'] . ' m<sup>2</sup>, nahaja se v okolici ' . $row['naslov'] . ', parcela pa je velika okoli ' . $row['parcela'] . ' m<sup>2</sup>. Spodnja slika je simbolična oz. približek željene nepremičnine.';
        break;
}
?>


<div class="portfolio-modal modal fade" id="portfolioModal<?php echo $st; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h3 class="text-uppercase"><a href="<?php echo 'nepremicnina.php?id=' . $row['id'] ?>"><?php echo $row['ime'] ?></h3></a>
                <h5 class="text-muted font-weight-light"><?php echo $row['ime_kraja'] . ', ' . $row['lokacija']?></h5>
                <p class="item-intro text-justify"><?php echo $text ?></p>
                <?php echo '<img class="imgdb" src="data:;base64,' . base64_encode($row['slika']) .'">' ?>
                <p class="text-justify"><?php echo $row['opis1'] ?></p><br>
                <p class="text-justify"><?php echo $row['opis2'] ?></p>
                <?php
                  echo '<p class="font-weight-bold text-left">Ponudnik in kontakt:</p>';
                  echo '<ul class="text-left">';
                  echo '<li>' . $row['uporabnik_ime'] . ' ' . $row['priimek'] . '</li>';
                  echo '<li>' . $row['telefon'] . '</li>';
                  echo '<li>' . $row['email'] . '</li><br><br>';
                ?>
                  <br><br>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
}
?>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>