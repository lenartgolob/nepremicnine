<!DOCTYPE html>
<html lang="en">

<head>

  <style>
  #navmain {
    background-color: #212529;
    padding: 20px;
  }
  #wrongpass {
    text-align: center;
    color: red;
    font-size: 80%;
  }
  }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Nepremicnine.net</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Login CSS -->
  <link rel="stylesheet" type="text/css" href="css/login.css">

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

  <div class="container" id="login-form">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="login_check.php" method="post">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="pass" required>
                <label for="inputPassword">Password</label>
              </div>
              <?php
                if(isset($_GET['msg']) && $_GET['msg']=="wrongpass") {
              ?>
              <div class="custom-control custom-checkbox mb-3" id="wrongpass">
                <p>Napačen email ali geslo!</p>
              </div>
              <?php
                }
              ?>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <a href="register.php">Don't have an account? Register here!</a>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <a href="g-callback.php"><button class="btn btn-lg btn-google btn-block text-uppercase"><i class="fab fa-google mr-2"></i> Sign in with Google</button></a>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<br>

<?php
include_once "footer.php";
?>

</body>

</html>
<script>
function wrongPass() {
  alert("Napačno geslo ali uporabniško ime!");
}
</script>