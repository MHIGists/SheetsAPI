<?php

use Sheets\API\PDOConnect;
use Sheets\Utils;

if (!empty($_GET['logout'])){
    Utils::setLoggedIn(false, true);
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url = strtok($url, '?');
    header('Location: ' . $url);
}
if (Utils::isLoggedIn()) {
    Utils::checkSetGetData($_GET);
    if (Utils::checkIDAndName($_SESSION)) {
        include_once 'parts/logged_index.php';
    }else{
        include_once "parts/enter_id_name.php";
    }
} else {
    include_once "parts/log_in_index.php";
}
if (!Utils::isLoggedIn() && Utils::checkPostData($_POST)) {
    unset($_POST['logout']);
    $string = Utils::$SETTINGS;
    PDOConnect::init($string);
    $response = PDOConnect::userExists($_POST['username'], $_POST['pass'], $string);
    if ($response != false) {
        Utils::setLoggedIn(true);
        Utils::setSessionData($response);
        header("Refresh:0");
    }
}