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
<table class="table table-hover" id="miza">
  <thead>
    <tr>
        <th>Slika</th>
        <th>Ime</th>
        <th>Kraj</th>
        <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'novogradnja' ORDER BY id DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    //izvedlo se bo tolikokrat, koliko je vrstic rezultata
    //trenutno vrstico shrani v spremenljivko $row
    while ($row = $stmt->fetch()) {
        $n_id = $row['id'];
        $query2 = "SELECT s.slika FROM slike s WHERE s.nepremicnina_id = ? ORDER BY id LIMIT 1";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute([$n_id]);
        $row2 = $stmt2->fetch();

        echo '<tr id="vrstica">';
        echo '<td><a href="nepremicnina.php?id='.$row['id'].'"><img class="slika" src="data:;base64,' . base64_encode($row2['slika']) .'"></a></td>';
        echo '<td><a href="nepremicnina.php?id='.$row['id'].'">'.$row['ime'].'</a></td>';
        echo '<td>'.$row['ime_kraja'].'</td>';
        echo '<td>'.$row['posredovanje'].'</td>';
        /*
        if ($row['user_id'] == $_SESSION['user_id']) {
            echo '<td>';
            echo '<a href="farm_delete.php?id='.$row['id'].'" onclick="return confirm(\'Prepričani?\');">B</a>';
            echo '<a href="farm_edit.php?id='.$row['id'].'">U</a>';
            echo '</td>';
        }
        */
        
        echo '</tr>';
    }
    
    ?>
  </tbody>
</table>

<?php
include_once "footer.php";
?>
</body>

</html>