<?php
    include_once "session.php";
    require_once "GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient -> setClientId("103267224268-sui3506lb7qei66ap37oafhti6vbcqat.apps.googleusercontent.com");
    $gClient -> setClientSecret("_hbU-z2x9gwobB5lX60dtQhs");
    $gClient -> setApplicationName("Nepremicnine");
    $gClient -> setRedirectUri("http://localhost/nepremicnine/g-callback.php");
    $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>