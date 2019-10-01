<?php
    require_once "fb-config.php";
    include_once "database.php";

    try {
        $accessToken = $helper->getAccessToken();
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo "Response Exception: " . $e->getMessage();
        exit();
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        echo "SDK Exception: " . $e->getMessage();
        exit();
    }

    if (!$accessToken) {
        header("Location: login.php");
        exit();
    }

    $oAuth2Client = $FB->getOAuth2Client();
    if (!$accessToken->isLongLived()){
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
    }

    $response = $FB->get("me?fields=id, first_name, last_name, email", $accessToken);
    $userData = $response->getGraphNode()->asArray();

   // $_SESSION['access_token'] = $accessToken;
    $_SESSION['email'] = $userData['email'];
    $_SESSION['ime'] = $userData['first_name'];
    $_SESSION['priimek'] = $userData['last_name'];

    $query = "SELECT * FROM uporabniki WHERE email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['email']]);
    if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['tip'] = $user['tip'];
    }
    else {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['tip'] = $user['tip'];
    $query = "INSERT INTO uporabniki (ime, priimek, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['ime'], $_SESSION['priimek'], $_SESSION['email']]);
    }

    header("Location: index.php");
    exit();

  //  header("Location: index.php");

?>