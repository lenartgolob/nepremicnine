<?php
require_once "config.php";
include_once "session.php";

$gClient->revokeToken();
session_destroy();

header("Location: login.php");
?>