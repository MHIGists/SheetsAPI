<?php

use Sheets\API\PDOConnect;
use Sheets\Utils;

if (Utils::checkPostData($_POST)){
    if (PDOConnect::createUser($_POST['username'], $_POST['pass'], Utils::$SETTINGS)){
        echo '<div class="info">User created!</div>';
    }else{
        echo '<div class="info">User exists</div>';
    }
}else{
    include_once 'parts/register_index.php';
}
