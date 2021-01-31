<?php
include_once '../load.php';
if (Utils::checkPostData($_POST)){
    PDOConnect::createUser($_POST['username'], $_POST['pass'], SETTINGS);
    heade
}