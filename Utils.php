<?php

namespace Sheets;

use Sheets\API\PDOConnect;

class Utils
{
    public static $SETTINGS = __DIR__ . '/settings.json';
    public static $CREDENTIALS = __DIR__ . '/credentials.json';

    public static function checkPostData(array $post)
    {
        return isset($post['username'], $post['pass']) && !empty($post['username']) && !empty($post['pass']);
    }

    public static function checkGetData($get)
    {
        return isset($get['spreadsheetID'], $get['sheet']) && !empty($get['spreadsheetID']) && !empty($get['sheet']);
    }

    public static function setGetData(array $get)
    {
        $_SESSION['sheet_id'] = $get['spreadsheetID'];
        $_SESSION['sheet_name'] = $get['sheet'];
    }

    public static function checkSetGetData(array $get)
    {
        if (self::checkGetData($get)) {
            self::setGetData($get);
            PDOConnect::addSheetNameAndID($get, $_SESSION['user_id'], self::$SETTINGS);
        }
    }

    public static function setSessionData(array $response)
    {
        if (!empty($response[0]['sheet_id']) && !empty($response[0]['sheet_name'])) {
            $_SESSION['sheet_id'] = $response[0]['sheet_id'];
            $_SESSION['sheet_name'] = $response[0]['sheet_name'];
            $_SESSION['user_id'] = $response[0]['id'];
            $_SESSION['user_name'] = $response[0]['username'];
        } else {
            $_SESSION['sheet_id'] = null;
            $_SESSION['sheet_name'] = null;
            $_SESSION['user_id'] = $response[0]['id'];
            $_SESSION['user_name'] = $response[0]['username'];
        }
    }

    public static function checkIDAndName(array $session)
    {
        return isset($session['sheet_id'], $session['sheet_name']) && !is_null($session['sheet_id']) && !is_null($session['sheet_name']);
    }

    public static function startSession()
    {
        session_start();
        if (!isset($_SESSION['logged_in'])) {
            $_SESSION['logged_in'] = false;
        }
    }

    public static function setLoggedIn(bool $logged, bool $clean = false)
    {
        if ($clean) {
            $_SESSION = [];
        }
        $_SESSION['logged_in'] = $logged;
    }

    public static function isLoggedIn()
    {
        return $_SESSION['logged_in'];
    }

    public static function getCurrentPage()
    {
        $pageURL = 'http';
        if (isset($_SERVER['HTTPS'])){
            if ($_SERVER["HTTPS"] === "on") {
                $pageURL .= "s";
            }
        }
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] !== "80") {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    public static function getRequestedRoute(){
        return parse_url(self::getCurrentPage(), PHP_URL_PATH);
}
}