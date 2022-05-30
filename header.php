<?php
include_once "session.php";
?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

    <div class="container" id="navmain">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Nepremicnine.net</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="stanovanja.php">Stanovanja</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="hise.php">Hiše</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="vikendi.php">Vikendi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="pocitnice.php"> Na Počitnice!</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="podjetja.php">Podjetja</a>
          </li>
          <li class="nav-item">
          <?php 
          if(!isset($_SESSION['user_id'])){
            echo '<a class="nav-link js-scroll-trigger" href="login.php">Prijava</a></li>';
          }
          else {
          ?>
          <li class="nav-item">
          <div class="dropdown">
              <button class="btn nav-link js-scroll-trigger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
                echo '<span class="text-uppercase">' . $_SESSION['ime'] . " " . $_SESSION['priimek'] . '</span>';
              ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile.php">M<span class="text-lowercase">oj profil</span></a>
                <a class="dropdown-item" href="myobjave.php">M<span class="text-lowercase">oje objave</span></a>
                <?php
                  if(isset($_SESSION['tip']) && $_SESSION['tip'] == "admin"){
                    echo '<a class="dropdown-item" href="vse_objave_admin.php">V<span class="text-lowercase">se objave</span></a>';
                  }
                ?>
                <a class="dropdown-item" href="odjava.php">O<span class="text-lowercase">djava</span></a>

              </div>
            </div>
            </li>
          <?php
          }
          ?>    
          </li>
        </ul>
  </div>
      </div>
    </div>
  </nav>