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
<br><br><br><br><br><br><br><br><br>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h5>Objavi oglas</h5><p></p></div>
                        <div class="card-body">
                            <form name="my-form" action="objava_insert.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Vrsta posredovanja:</label>
                                    <div class="col-md-6">
                                        <select name="posredovanje" class="form-control" >
                                            <option value="Prodaja">Prodaja</option>
                                            <option value="Nakup">Nakup</option>
                                            <option value="Oddaja">Oddaja</option>
                                            <option value="Najem">Najem</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Naslov oglasa:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="naslov" class="form-control" name="ime" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Vrsta nepremičnine:</label>
                                    <div class="col-md-6">
                                        <select name="vrsta" class="form-control" >
                                            <option value="stanovanje">Stanovanje</option>
                                            <option value="hisa">Hiša</option>
                                            <option value="vikend">Vikend</option>
                                            <option value="pocitniski">Počitniški objekt</option>
                                            <option value="poslovni">Poslovni prostor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Tip nepremičnine:</label>
                                    <div class="col-md-6">
                                        <table width="100%">
                                            <tr>
                                                <td><input type="radio" name="tip" value="soba" checked="checked"> Soba </td>
                                                <td><input type="radio" name="tip" value="garsonjera"> Garsonjera </td>
                                                <td><input type="radio" name="tip" value="2-sobno" > 2-sobno </td>
                                                <td><input type="radio" name="tip" value="3-sobno" > 3-sobno </td>
                                            </tr>
                                                <td><input type="radio" name="tip" value="4-sobno"> 4-sobno </td>
                                                <td> <input type="radio" name="tip" value="5-sobno"> 5 in večsobno </td>
                                                <td> <input type="radio" name="tip" value="apartma"> Apartma </td>
                                                <td> <input type="radio" name="tip" value="drugo"> Drugo </td>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Naslov nepremicnine:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="naslov" class="form-control" name="naslov" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Kraj:</label>
                                    <div class="col-md-6">
                                    <select class="form-control selectpicker" id="select-person" data-live-search="true" name="kraj" class="form-control">
                                        <?php
                                               $query = "SELECT * FROM kraji";
                                               $stmt = $pdo->prepare($query);
                                               $stmt->execute();
                                               //izvedlo se bo tolikokrat, koliko je vrstic rezultata
                                               //trenutno vrstico shrani v spremenljivko $row
                                               while ($row = $stmt->fetch()) {
                                                   echo '<option value="' . $row['id'] . '">' . $row['ime'] . '</option>';
                                               }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Lokacija (dodaten opis lokacije):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="lokacija" name="lokacija" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Telefonska številka:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="telefon" name="telefon" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Velikost nepremicnine (m<sup>2</sup>):</label>
                                    <div class="col-md-6">
                                        <input type="number" id="present_address" name="velikost" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Parcela (m<sup>2</sup>):</label>
                                    <div class="col-md-6">
                                        <input type="number" id="present_address" name="parcela" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Cena:</label>
                                    <div class="col-md-6">
                                        <input type="number" id="present_address" name="cena" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (krajši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="opis1" required> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (daljši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="opis2" required> </textarea>
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
                                        Objavi
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

