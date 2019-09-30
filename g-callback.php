<?php
    require_once "config.php";
    include_once "database.php";

    if(isset($_SESSION['access_token'])){
        $gClient->setAccessToken($_SESSION['access_token']);
    }

    else if(isset($_GET['code'])) {
        $token = $gClient -> fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }

    else {
        header("Location: login.php");
        exit();
    }



    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

   

    $_SESSION['email'] = $userData['email'];
    $_SESSION['priimek'] = $userData['familyName'];
    $_SESSION['ime'] = $userData['givenName'];

    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['email']]);
    if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['tip'] = $user['tip'];
    }
    else {
    $query = "INSERT INTO uporabniki (ime, priimek, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['ime'], $_SESSION['priimek'], $_SESSION['email']]);
    }

    header("Location: index.php");
    exit();
?>