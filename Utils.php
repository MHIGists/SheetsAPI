<?php


class Utils
{

    public static function checkPostData(array $post){
        return isset($post['username'], $post['pass']) && !empty($post['username']) && !empty($post['pass']);
    }
    public static function checkGetData($get){
        return isset($get['spreadsheetID'], $get['sheet']) && !empty($get['spreadsheetID']) && !empty($get['sheet']);
    }
    public static function setGetData(array $get){
        $_SESSION['sheet_id'] = $get['spreadsheetID'];
        $_SESSION['sheetName'] = $get['sheet'];
    }
    public static function setSessionData(array $response){
        if (!empty($response[0]['sheet_id']) && !empty($response[0]['sheetName'])){
            $_SESSION['sheet_id'] = $response[0]['sheet_id'];
            $_SESSION['sheetName'] = $response[0]['sheetName'];
        }else{
            $_SESSION['sheet_id'] = null;
            $_SESSION['sheetName'] = null;
        }
    }
    public static function checkIDAndName(array $session){
        return isset($session['sheet_id'], $session['sheetName']) && !is_null($session['sheet_id']) && !is_null($session['sheetName']);
}
    public static function startSession(){
        session_start();
        if (!isset($_SESSION['logged_in'])){
            $_SESSION['logged_in'] = false;
        }
    }
    public static function setLoggedIn(bool $logged){
        $_SESSION['logged_in'] = $logged;
    }
    public static function isLoggedIn(){
        return $_SESSION['logged_in'];
    }
}