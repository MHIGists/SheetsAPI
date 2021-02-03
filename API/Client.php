<?php

namespace Sheets\API;
use Google_Client;
use Google_Service_Sheets;

use Sheets\Utils;

class Client
{
    private static $client;
    private static $service;
    private static $spreadsheetID;
    private static $sheetName;
    private static $instance = null;
    private const ID = "1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg";
    private const SHEET_NAME = 'Sheet1!';

    private function __construct(){}

    public static function init(string $spreadsheetID = self::ID, string $sheetName = self::SHEET_NAME){
        if (self::$instance === null){
            self::$instance = true;
            self::init();
        }else{
            self::$client = new Google_Client();
            self::$client->setApplicationName("SheetsAPI project");
            self::$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
            self::$client->setAccessType("offline");
            self::$client->setAuthConfig(Utils::$CREDENTIALS);
            self::$service = new  Google_Service_Sheets(self::$client);
            self::$spreadsheetID = $spreadsheetID;
            self::$sheetName = $sheetName;
        }

 }
    public static function getClient(string $id = self::ID , string $sheetName = self::SHEET_NAME): Google_Client
    {
        self::init($id,$sheetName);
        return self::$client;
    }
    public static function getService(string $id = self::ID ,string $sheetName = self::SHEET_NAME): Google_Service_Sheets
    {
        self::init($id,$sheetName);
        return self::$service;
    }
    public static function getSheetName(string $id = self::ID ,string $sheetName = self::SHEET_NAME){
        self::init($id,$sheetName);
        return self::$sheetName;
    }
    public static function getSpreadsheetID(string $id = self::ID,string $sheetName = self::SHEET_NAME){
        self::init($id,$sheetName);
        return self::$spreadsheetID;
    }
    public static function setSpreadSheetID(string $id = self::ID,string $sheetName = self::SHEET_NAME){
        self::init($id,$sheetName);
        self::$spreadsheetID = $id;
    }
    public static function setSheetName(string $id = self::ID,string $sheetName = self::SHEET_NAME){
        self::init($id,$sheetName);
        self::$sheetName = $sheetName;
    }

}