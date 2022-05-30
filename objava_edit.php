<?php
include_once "database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <style>
  #navmain {
    background-color: #212529;
    padding: 20px;
  }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nepremicnine.net</title>

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
<br><br><br><br><br><br><br><br><br>

<?php
// Iz DB dobimo vse podatke o nepremicni katero zelimo editati

$n_id = $_GET['id'];
$query = "SELECT n.*, s.slika, k.posta, k.ime AS ime_kraja, u.ime AS uporabnik_ime, u.priimek, u.email FROM nepremicnine n INNER JOIN uporabniki u ON u.id = n.uporabnik_id INNER JOIN kraji k ON k.id = n.kraj_id INNER JOIN slike s ON n.id = s.nepremicnina_id WHERE n.id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$n_id]);
$row = $stmt->fetch();

// Preverimo katero posredovanje je izbrano in ga kasneje s pomočjo te spremenljivke nastavimo kot selected
switch ($row['posredovanje']) {
    case "Prodaja":
        $prodaja = "selected";
        $nakup = "";
        $oddaja = "";
        $najem = "";
        break;
    case "Nakup":
        $prodaja = "";
        $nakup = "selected";
        $oddaja = "";
        $najem = "";
        
        break;
    case "Oddaja":
        $prodaja = "";
        $nakup = "";
        $oddaja = "selected";
        $najem = "";
        break;
    case "Najem":
        $prodaja = "";
        $nakup = "";
        $oddaja = "";
        $najem = "selected";
        break;
}

// Preverimo katera vrsta nepremicnine je izbrana in jo kasneje s pomočjo te spremenljivke nastavimo kot checked
switch ($row['vrsta']) {
    case "stanovanje":
        $stanovanje = "selected";
        $hisa = "";
        $vikend = "";
        $pocitniski = "";
        $poslovni = "";
        break;

    case "hisa":
        $stanovanje = "";
        $hisa = "selected";
        $vikend = "";
        $pocitniski = "";
        $poslovni = "";
        break;

    case "vikend":
        $stanovanje = "";
        $hisa = "";
        $vikend = "selected";
        $pocitniski = "";
        $poslovni = "";
        break;

    case "pocitniski":
        $stanovanje = "";
        $hisa = "";
        $vikend = "";
        $pocitniski = "selected";
        $poslovni = "";
        break;

    case "poslovni":
        $stanovanje = "";
        $hisa = "";
        $vikend = "";
        $pocitniski = "";
        $poslovni = "selected";
        break;
}


// Preverimo kateri tip nepremicnine je izbran in ga kasneje s pomočjo te spremenljivke nastavimo kot checked
switch ($row['tip']) {
    case "soba":
        $soba = "checked";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "";
        $drugo = "";
        break;

    case "garsonjera":
        $soba = "";
        $garsonjera = "checked";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "";
        $drugo = "";
        break;

    case "2-sobno":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "checked";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "";
        $drugo = "";
        break;

    case "3-sobno":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "checked";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "";
        $drugo = "";
        break;

    case "4-sobno":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "checked";
        $sobna5 = "";
        $apartma = "";
        $drugo = "";
        break;

    case "5-sobno":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "checked";
        $apartma = "";
        $drugo = "";
        break;

    case "apartma":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "checked";
        $drugo = "";
        break;

    case "drugo":
        $soba = "";
        $garsonjera = "";
        $sobna2 = "";
        $sobna3 = "";
        $sobna4 = "";
        $sobna5 = "";
        $apartma = "";
        $drugo = "checked";
        break;
}
?>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h5>Edit oglas</h5></div>
                        <div class="card-body">
                            <form name="my-form" action="objava_update.php?id=<?php echo $n_id; ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Vrsta posredovanja:</label>
                                    <div class="col-md-6">
                                        <select name="posredovanje" class="form-control">
                                            <option <?php echo $prodaja; ?> value="Prodaja">Prodaja</option>
                                            <option <?php echo $nakup; ?> value="Nakup">Nakup</option>
                                            <option <?php echo $oddaja; ?> value="Oddaja">Oddaja</option>
                                            <option <?php echo $najem; ?> value="Najem">Najem</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Naslov oglasa:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="naslov" value="<?php echo $row['ime'] ?>" class="form-control" name="ime">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Vrsta nepremičnine:</label>
                                    <div class="col-md-6">
                                        <select name="vrsta" class="form-control" >
                                            <option <?php echo $stanovanje; ?> value="stanovanje">Stanovanje</option>
                                            <option <?php echo $hisa; ?> value="hisa">Hiša</option>
                                            <option <?php echo $vikend; ?> value="vikend">Vikend</option>
                                            <option <?php echo $pocitniski; ?> value="pocitniski">Počitniški objekt</option>
                                            <option <?php echo $poslovni; ?> value="poslovni">Poslovni prostor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Tip nepremičnine:</label>
                                    <div class="col-md-6">
                                        <table width="100%">
                                            <tr>
                                                <td><input type="radio" name="tip" value="soba" <?php echo $soba; ?>> Soba </td>
                                                <td><input type="radio" name="tip" value="garsonjera" <?php echo $garsonjera; ?>> Garsonjera </td>
                                                <td><input type="radio" name="tip" value="2-sobna nepremičnina" <?php echo $sobna2; ?>> 2-sobno </td>
                                                <td><input type="radio" name="tip" value="3-sobna nepremičnina" <?php echo $sobna3; ?>> 3-sobno </td>
                                            </tr>
                                                <td><input type="radio" name="tip" value="4-sobna nepremičnina" <?php echo $sobna4; ?>> 4-sobno </td>
                                                <td> <input type="radio" name="tip" value="5 in večsobna nepremičnina" <?php echo $sobna5; ?>> 5 in večsobno </td>
                                                <td> <input type="radio" name="tip" value="nepremičnina tipa apartma" <?php echo $apartma; ?>> Apartma </td>
                                                <td> <input type="radio" name="tip" value="nepremičnina" <?php echo $drugo; ?>> Drugo </td>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Naslov nepremicnine:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="naslov" class="form-control" value="<?php echo $row['naslov']; ?>" name="naslov">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Kraj:</label>
                                    <div class="col-md-6">
                                    <select class="form-control selectpicker" id="select-person" data-live-search="true" name="kraj" class="form-control">
                                        <?php
                                            $kraj = $row['ime_kraja'];
                                            echo $kraj;

                                            $query = "SELECT * FROM kraji";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute();

                                            while ($row = $stmt->fetch()) {
                                                if($kraj == $row['ime']){
                                                    $selected = "selected";
                                                }
                                                else {
                                                    $selected = "";
                                                }
                                                echo '<option value="' . $row['id'] . '"' . $selected .'>' . $row['ime'] . '</option>';
                                            }

                                            $query = "SELECT n.*, s.slika, k.posta, k.ime AS ime_kraja, u.ime AS uporabnik_ime, u.priimek, u.email FROM nepremicnine n INNER JOIN uporabniki u ON u.id = n.uporabnik_id INNER JOIN kraji k ON k.id = n.kraj_id INNER JOIN slike s ON n.id = s.nepremicnina_id WHERE n.id = ?";
                                            $stmt = $pdo->prepare($query);
                                            $stmt->execute([$n_id]);
                                            $row = $stmt->fetch();
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Lokacija (dodaten opis lokacije):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="lokacija" value="<?php echo $row['lokacija']; ?>" name="lokacija" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Telefonska številka:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="telefon" value="<?php echo $row['telefon']; ?>" name="telefon" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Velikost nepremicnine (m<sup>2</sup>):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="present_address" name="velikost" value="<?php echo $row['velikost']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Parcela (m<sup>2</sup>):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="present_address" value="<?php echo $row['parcela']; ?>" name="parcela" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Cena:</label>
                                    <div class="col-md-6">
                                        <input type="number" id="present_address" value="<?php echo $row['cena']; ?>" name="cena" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (krajši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" <?php echo $row['opis1']; ?> name="opis1"> <?php echo $row['opis1']; ?> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (daljši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="opis2"> <?php echo $row['opis2']; ?> </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Slike:</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="myfile[]" accept="image/jpeg, image/png, image/jpg" multiple required>   
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button name="sbmt" type="submit" class="btn btn-primary">
                                        Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<br><br><br>
<?php
include_once "footer.php";
?>

</body>
</html>


