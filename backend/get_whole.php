<?php
error_reporting(0);
include_once "../load.php";
Utils::startSession();
include "../frontend/header_1.php";
new GetInRange(true);
include "../frontend/footer_1.php";