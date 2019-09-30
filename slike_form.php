<?php
include_once "database.php";
include_once "session.php";
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
                        <div class="card-header"><h5>Izberi slike</h5></div>
                        <div class="card-body">
                        <?php
                            
                            // Dobiš id od nepremicnine za katero vstavljaš sliko

                            $query = "SELECT id FROM nepremicnine ORDER BY id DESC LIMIT 1";
                            $stmt = $pdo->prepare($query);
                            $stmt->execute();
                            $row = $stmt->fetch();
                            $nepremicnina_id = $row['id'];
                            
                            
                            // Ob pritisku gumba se slika shrani v DB
                            if(isset($_POST['btn'])){

                                $name = $_FILES['myfile']['name'];
                                $type = $_FILES['myfile']['type'];
                                $data = file_get_contents($_FILES['myfile']['tmp_name']);

                                $query = "INSERT INTO slike (ime, tip, slika, nepremicnina_id) VALUES (?, ?, ?, ?)";
                                $stmt = $pdo->prepare($query);
                                $stmt->execute([$name, $type, $data, $nepremicnina_id]);

                                header("Location: index.php");

                            }
                        ?>
                            <form name="my-form" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Slike:</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="myfile" accept="image/jpeg, image/png, image/jpg" required>   
                                    </div>
                                </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button name="btn" class="btn btn-primary">
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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include_once "footer.php";
?>

</body>

</html>

