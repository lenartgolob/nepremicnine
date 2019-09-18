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

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h5>Objavi oglas</h5></div>
                        <div class="card-body">
                            <form name="my-form" action="objava_insert.php" method="POST">
                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Vrsta posredovanja:</label>
                                    <div class="col-md-6">
                                        <select name="posredovanje" class="form-control">
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
                                        <input type="text" id="naslov" class="form-control" name="ime">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Vrsta nepremicnine:</label>
                                    <div class="col-md-6">
                                        <table width="100%">
                                            <tr>
                                                <td><input type="radio" name="vrsta" value="novogradnja" checked="checked"> Novogradnja </td>
                                                <td><input type="radio" name="vrsta" value="hisa"> Hiša </td>
                                                <td><input type="radio" name="vrsta" value="montazna" > Montažna hiša </td>
                                            </tr>
                                                <td><input type="radio" name="vrsta" value="vikend"> Vikend </td>
                                                <td> <input type="radio" name="vrsta" value="pocitniski"> Počitniški objekt </td>
                                                <td> <input type="radio" name="vrsta" value="poslovni"> Poslovni prostor </td>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Naslov nepremicnine:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="naslov" class="form-control" name="naslov">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Kraj:</label>
                                    <div class="col-md-6">
                                        <select class="form-control selectpicker" id="select-person" data-live-search="true" name="kraj" class="form-control">
                                            <option value="Velenje">Velenje</option>
                                            <option value="Celje">Celje</option>
                                            <option value="Ljubljana">Ljubljana</option>
                                            <option value="Maribor">Maribor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">Država:</label>
                                    <div class="col-md-6">
                                        <input type="radio" name="drzava" value="Slovenija" checked="checked"> Slovenija <br>
                                        <input type="radio" name="drzava" value="Hrvaška"> Hrvaška <br>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Lokacija (dodaten opis lokacije):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="lokacija" name="lokacija" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Telefonska stevilka:</label>
                                    <div class="col-md-6">
                                        <input type="text" id="telefon" name="telefon" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Parcela (m<sup>2</sup>):</label>
                                    <div class="col-md-6">
                                        <input type="text" id="present_address" name="parcela" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (krajši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="opis1"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Opis (daljši paragraf):</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="opis2"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Slike:</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="img" multiple>   
                                    </div>
                                </div>


                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
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

