<?php

use Sheets\API\PDOConnect;
use Sheets\Utils;

if (checkGetData()){
    PDOConnect::changeUserData($_GET['user_name'], $_GET['password'], $_GET['sheet_id'], $_GET['sheet_name'], Utils::$SETTINGS);
}else{
    include_once 'parts/account.php';
}
function checkGetData(): bool
{
    return (isset($_GET['user_name'], $_GET['password'], $_GET['sheet_id'], $_GET['sheet_name']));
}
