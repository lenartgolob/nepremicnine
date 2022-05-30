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

  <script src="js/sort.js"></script>


</head>

<body id="page-top">

<?php
include_once "header.php";
?>

<br><br><br><br><br><br><br><br>
<div style="display: flex; flex-direction: row; justify-content: space-between;">
  <div>
    <div class="card" style="width: 130px; font-size: 70%; margin-left: 10px;">
      <div class="card-header">
        Posredovanje
      </div>
      <div class="row">
        <div style="width: 83%; margin-left: 14px;">
          <ul class="list-group">
            <li style="cursor: pointer;" class="list-group-item" id="prodaja">Prodaja</li>
            <li style="cursor: pointer;" class="list-group-item" id="nakup">Nakup</li>
            <li style="cursor: pointer;" class="list-group-item" id="oddaja">Oddaja</li>
            <li style="cursor: pointer;" class="list-group-item" id="najem">Najem</li>
          </ul>
        </div>
      </div>
    </div>
    <br>
    <div class="card" style="width: 130px; font-size: 70%; margin-left: 10px;">
      <div class="card-header">
        Tip
      </div>
      <div class="row">
        <div style="width: 83%; margin-left: 14px;">
          <ul class="list-group">
            <li style="cursor: pointer;" class="list-group-item" id="soba">Soba</li>
            <li style="cursor: pointer;" class="list-group-item" id="garsonjera">Garsonjera</li>
            <li style="cursor: pointer;" class="list-group-item" id="2-sobno">2-sobno</li>
            <li style="cursor: pointer;" class="list-group-item" id="3-sobno">3-sobno</li>
            <li style="cursor: pointer;" class="list-group-item" id="4-sobno">4-sobno</li>
            <li style="cursor: pointer;" class="list-group-item" id="5-sobno">5 in večsobno</li>
            <li style="cursor: pointer;" class="list-group-item" id="apartma">Apartma</li>
            <li style="cursor: pointer;" class="list-group-item" id="drugo">Drugo</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div style="margin-right: 10%;">
    <div style="width: 80%; margin: 0 auto; margin-bottom: 20px; display: flex; flex-direction: row; justify-content: space-between">
      <div></div>
      <div>
      <?php
      if(isset($_GET['sort'])){
        switch ($_GET['sort']) {
          case "price-asc":
              $priceAsc = "selected";
              $priceDesc = "";
              $date = "";
              $m2Asc = "";
              $m2Desc = "";
              break;
          case "price-desc":
              $priceAsc = "";
              $priceDesc = "selected";
              $date = "";
              $m2Asc = "";
              $m2Desc = "";
              break;
          case "date":
              $priceAsc = "";
              $priceDesc = "";
              $date = "selected";
              $m2Asc = "";
              $m2Desc = "";
              break;
          case "m2-asc":
              $priceAsc = "";
              $priceDesc = "";
              $date = "";
              $m2Asc = "selected";
              $m2Desc = "";
              break;
          case "m2-desc":
              $priceAsc = "";
              $priceDesc = "";
              $date = "";
              $m2Asc = "";
              $m2Desc = "selected";
              break;
      }
      }
      ?>
      <form name="sort-form" method="GET" action="stanovanja.php" >
          <select name="sort" id="sort" class="form-control" style="width: 180px;" >
            <option value="" selected disabled>Sort</option>
            <option <?php if(isset($_GET['sort'])) {echo $priceAsc;} ?> value="price-asc">cena naraščajoča</option>
            <option <?php if(isset($_GET['sort'])) {echo $priceDesc;} ?> value="price-desc">cena padajoča</option>
            <option <?php if(isset($_GET['sort'])) {echo $date;} ?> value="date">datum vpisa</option>
            <option <?php if(isset($_GET['sort'])) {echo $m2Asc;} ?> value="m2-asc">m2 naraščajoča</option>
            <option <?php if(isset($_GET['sort'])) {echo $m2Desc;} ?> value="m2-desc">m2 padajoča</option>
          </select>
        </form>
      </div>
    </div>
    <table class="table table-hover" id="miza">
      <thead>
        <tr>
            <th>Slika</th>
            <th>Ime</th>
            <th>Kraj</th>
            <th>Velikost</th>
            <th>Cena</th>
            <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['posredovanje'])) {
          $posredovanje = $_GET['posredovanje'];
        } else {
          $posredovanje = '%';
        }
        if(isset($_GET['tip'])) {
          $tip = $_GET['tip'];
        } else {
          $tip = '%';
        }
        if(!isset($_GET['sort'])) {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY id DESC";
        }
        elseif($_GET['sort'] == "price-asc") {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY n.cena";
        }
        elseif($_GET['sort'] == "price-desc") {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY n.cena DESC";
        }
        elseif($_GET['sort'] == "date") {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY id DESC";
        }
        elseif($_GET['sort'] == "m2-asc") {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY n.velikost";
        }
        elseif($_GET['sort'] == "m2-desc") {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY n.velikost DESC";
        }
        else {
          $query = "SELECT n.*, k.ime AS ime_kraja FROM nepremicnine n INNER JOIN kraji k ON k.id = n.kraj_id WHERE n.vrsta = 'stanovanje' AND n.posredovanje LIKE ? AND n.tip LIKE ? ORDER BY id DESC";
        }

        $stmt = $pdo->prepare($query);
        $stmt->execute([$posredovanje, $tip]);
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
            echo '<td>'.$row['velikost'].' m<sup>2</sup></td>';
            echo '<td>'.$row['cena'].' €</td>';
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
  </div>
</div>

<?php
include_once "footer.php";
?>

</body>

</html>
<script>
$(document).ready(function() {
    $('#sort').on('change', function() {
      var url = new URL(window.location.href);
      url.searchParams.set('sort', document.getElementById("sort").value);
      window.location.href = url.href;
    });

    window.location.search.substr(1).split("&").forEach(element => {
      if(element.split("=")[0] == "posredovanje") {
        if(element.split("=")[1] == "prodaja") {
          document.getElementById("prodaja").classList.add("active");
        }
        else if(element.split("=")[1] == "nakup") {
          document.getElementById("nakup").classList.add("active");
        }
        else if(element.split("=")[1] == "oddaja") {
          document.getElementById("oddaja").classList.add("active");
        }
        else if(element.split("=")[1] == "najem") {
          document.getElementById("najem").classList.add("active");
        }
      }
      else if(element.split("=")[0] == "tip") {
        if(element.split("=")[1] == "soba") {
          document.getElementById("soba").classList.add("active");
        }
        else if(element.split("=")[1] == "garsonjera") {
          document.getElementById("garsonjera").classList.add("active");
        }
        else if(element.split("=")[1] == "2-sobno") {
          document.getElementById("2-sobno").classList.add("active");
        }
        else if(element.split("=")[1] == "3-sobno") {
          document.getElementById("3-sobno").classList.add("active");
        }
        else if(element.split("=")[1] == "4-sobno") {
          document.getElementById("4-sobno").classList.add("active");
        }
        else if(element.split("=")[1] == "5-sobno") {
          document.getElementById("5-sobno").classList.add("active");
        }
        else if(element.split("=")[1] == "apartma") {
          document.getElementById("apartma").classList.add("active");
        }
        else if(element.split("=")[1] == "drugo") {
          document.getElementById("drugo").classList.add("active");
        }
      }
    });
  });

  $('#prodaja').click(function(){
    window.location.href = "stanovanja.php?posredovanje=prodaja";
  });
  $('#nakup').click(function(){
    window.location.href = "stanovanja.php?posredovanje=nakup";
  });
  $('#oddaja').click(function(){
    window.location.href = "stanovanja.php?posredovanje=oddaja";
  });
  $('#najem').click(function(){
    window.location.href = "stanovanja.php?posredovanje=najem";
  });


  $('#soba').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=soba";
    } else {
      window.location.href = "stanovanja.php?tip=soba";
    }
  });
  $('#2-sobno').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=2-sobno";
    } else {
      window.location.href = "stanovanja.php?tip=2-sobno";
    }
  });
  $('#3-sobno').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=3-sobno";
    } else {
      window.location.href = "stanovanja.php?tip=3-sobno";
    }
  });
  $('#4-sobno').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=4-sobno";
    } else {
      window.location.href = "stanovanja.php?tip=4-sobno";
    }
  });
  $('#5-sobno').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=5-sobno";
    } else {
      window.location.href = "stanovanja.php?tip=5-sobno";
    }
  });
  $('#garsonjera').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=garsonjera";
    } else {
      window.location.href = "stanovanja.php?tip=garsonjera";
    }
  });
  $('#apartma').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=apartma";
    } else {
      window.location.href = "stanovanja.php?tip=apartma";
    }
  });
  $('#drugo').click(function(){
    var posredovanje = false;
    var tip = false;
    window.location.search.substr(1).split("&").forEach(element => {
      // Če že vsebuje posredovanje parameter se cel link resetira
      if(element.split("=")[0] == "posredovanje") {
        posredovanje = true;
        posredovanjeValue = element.split("=")[1];
      }
    });
    if(posredovanje) {
      window.location.href = "stanovanja.php?posredovanje=" + posredovanjeValue + "&tip=drugo";
    } else {
      window.location.href = "stanovanja.php?tip=drugo";
    }
  });
</script>
