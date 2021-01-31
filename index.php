<?php
include_once "frontend/header.php";
include_once "load.php";
Utils::startSession();
if (!empty($_GET['logout'])){
    echo 'Logging out!';
    Utils::setLoggedIn(false, true);
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url = strtok($url, '?');
    header('Location: ' . $url);
}
if (Utils::isLoggedIn()) {
    Utils::checkSetGetData($_GET);
    if (Utils::checkIDAndName($_SESSION)) {
        include_once 'frontend/logged_index.php';
    }else{
        include_once "frontend/enter_id_name.php";
    }
} else {
    include_once "frontend/log_in_index.php";
}
if (!Utils::isLoggedIn() && Utils::checkPostData($_POST)) {
    unset($_POST['logout']);
    $string = SETTINGS;
    PDOConnect::init($string);
    $response = PDOConnect::userExists($_POST['username'], $_POST['pass'], $string);
    if ($response != false) {
        Utils::setLoggedIn(true);
        Utils::setSessionData($response);
        header("Refresh:0");
    }
}
include_once "frontend/footer.php";