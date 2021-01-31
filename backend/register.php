<?php
include_once '../load.php';
include_once '../frontend/header_1.php';
if (Utils::checkPostData($_POST)){
    if (PDOConnect::createUser($_POST['username'], $_POST['pass'], SETTINGS)){
        echo '<div class="info">Username created!</div>';
    }else{
        echo '<div class="info">Username exists</div>';
    }
}else{
    include_once '../frontend/register_index.php';
}
include_once '../frontend/footer_1.php';