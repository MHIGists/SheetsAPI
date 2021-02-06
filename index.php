<?php

use Sheets\API\Routes;
use Sheets\Utils;

include_once 'vendor/autoload.php';

Utils::startSession();
$pages = glob(__DIR__ . '\\pages\\*.php');
foreach ($pages as $page) {
    Routes::addRoute(pathinfo($page)['filename'], $page);
    Routes::addRoute(pathinfo($page)['basename'], $page);
}
$request = explode('/', Utils::getRequestedRoute());
$request = array_values(array_filter($request));
if (empty($request)){
    $request[] = 'index';
}
$requested_page = $request[0];
$params = [];
foreach ($request as $key => $item) {
    if ($key == 0){
        continue;
    }
    $params[] = $item;
}
include_once 'parts/header.php';
include_once Routes::getRoute($requested_page, $params);
include_once 'parts/footer.php';
