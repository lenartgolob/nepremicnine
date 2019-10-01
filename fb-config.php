<?php
    require_once "Facebook/autoload.php";
    include_once "session.php";

    $FB = new \Facebook\Facebook([
        'app_id' => '2193669114258832',
        'app_secret' => 'ab30f3d81ec84ed3b7dd313144a9ca50',
        'default_graph_version' => 'v2.10',
    ]);
    
    $helper = $FB ->getRedirectLoginHelper();

?>
