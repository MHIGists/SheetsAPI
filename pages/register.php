<?php

use Sheets\API\PDOConnect;
use Sheets\Utils;

if (Utils::checkPostData($_POST)){
    if (PDOConnect::createUser($_POST['username'], $_POST['pass'], Utils::$SETTINGS)){
        echo '<div class="info">Username created!</div>';
    }else{
        echo '<div class="info">Username exists</div>';
    }
}else{
    include_once 'parts/register_index.php';
}
