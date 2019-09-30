<?php
include_once "database.php";
include_once "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <style>
  #navmain {
    background-color: #212529;
    padding: 20px;
  }

  table {
    table-layout: fixed;
    margin: 0 auto;
  }

  #miza {
    width: 80%;
    text-align: center;
  }

  img {
    width: 100%;
  }
  }

  .profil_pass {
      color: red;
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

<div class="container">
            <div class="row">
                <div class="col-md-12  toppad  offset-md-0 ">
                </div>
                <div class="col-md-6  offset-md-0  toppad" >
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Urejanje profila</h2>
                            <form method="POST" action="profile_update.php">
                            <table class="table table-user-information ">
                                <tbody>
                                
                                    <tr>
                                        <td>Ime:</td>
                                        <td><input type="text" name="ime" value="<?php echo $_SESSION["ime"]; ?>" required="required"></td>
                                    </tr>
                                    <tr>
                                        <td>Priimek:</td>
                                        <td><input type="text" name="priimek" value="<?php echo $_SESSION["priimek"]; ?>" required="required"></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td>
                                            <input
                                                icon="email-icon"
                                                name="email"
                                                type="email"
                                                label=""
                                                value="<?php echo $_SESSION["email"]; ?>"
                                                focus
                                                required="required"
                                            />
                                        </td>
                                    </tr>                                           
                                    
                                </tbody>
                            </table>
                            
                            <input class="btn btn-primary ml-2" class="profile_submit" type="submit" value="Posodobi">
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6  offset-md-0  toppad">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Zamenjaj geslo</h3>
                            <form method="POST" action="change_pass.php">
                            <table class="table table-user-information ">
                                <tbody>
                                    <tr>
                                        <td>Trenutno geslo:</td>
                                        <td>
                                            <input
                                            icon="password-icon"
                                            name="password_old"
                                            type="password"
                                            value=''
                                            focus
                                            required="required"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Novo geslo:</td>
                                        <td>
                                            <Input
                                            icon="password-icon"
                                            name="newPassword1"
                                            type="password"
                                            value=''
                                            minlength="6"
                                            required="required"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ponovi novo geslo:</td>
                                        <td>
                                            <Input
                                            icon="password-icon"
                                            name="newPassword2"
                                            type="password"
                                            value=''
                                            minlength="6"
                                            required="required"
                                            />
                                        </td>
                                    </tr>
                                    <tr>
                                            <?php
                                            if (isset($_GET["msg"]) && $_GET["msg"] == 'wrong_pass'){
                                                echo '<td class="profil_pass">Staro geslo ni pravilno!</td>';
                                            }

                                            if (isset($_GET["msg"]) && $_GET["msg"] == 'razlicni'){
                                                echo '<td class="profil_pass">Novi gesli se razlikujeta!</td>';
                                            }
                                            ?>
                                    </tr>
                                </tbody>
                            </table>   
                            
                            <input class="btn btn-primary ml-2" class="profile_submit" type="submit" value="Spremeni geslo">
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
