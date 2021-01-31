<?php
require_once "vendor/autoload.php";
include_once "API/BatchUpdate.php";
include_once "API/GetInRange.php";
include_once "API/EditDataInRange.php";
include_once "API/Client.php";
include_once "API/DrawInputForm.php";
include_once "API/DrawTable.php";
include_once "API/PDOConnect.php";
include_once "Utils.php";
define('CREDENTIALS', __DIR__ .'/credentials.json');
define('SETTINGS', __DIR__ . '/settings.json');