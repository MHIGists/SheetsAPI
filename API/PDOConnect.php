<?php

namespace Sheets\API;
use PDO;
use PDOException;
class PDOConnect
{
    /**
     * @var PDO
     */
    protected static $connection;
    /**
     * @var string
     */
    private static $string;
    public function __construct(){}
    public static function init($string){
        if (is_null(self::$connection)){
            self::$string = $string;
            $settings = json_decode(file_get_contents(self::$string), true);
            $dsn = "mysql:dbname={$settings['dbname']};host=" . $settings['host'];
            try {
                self::$connection = new PDO($dsn,$settings['user'], $settings['password']);

            }catch (PDOException $e){
                echo 'Connection failed ' . $e->getMessage();
            }
        }
    }
    public static function userExists(string $username, string $password, $string){
        self::init($string);
        $statement = 'SELECT * FROM users WHERE username = :username AND password = :password';
        $sth = self::$connection->prepare($statement,[PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([':username' => $username, ':password' => $password]);
        $response = $sth->fetchAll();
        if (!empty($response)){
            return $response;
        }
        return false;
    }
    public static function createUser($username, $password, $string){
        self::init($string);
        if (self::userExists($username, $password,$string) == false){
            $sql = 'INSERT INTO users (id, username, password, sheet_id, sheet_name) VALUES (NULL, :username, :password, NULL, NULL)';
            $sth = self::$connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $sth->execute([':username' => $username, ':password' => $password]);
            return true;
        }
        return false;
    }
    public static function addSpreadSheetID(string $id, string $user_id, $string){
        self::init($string);
        $sql = 'UPDATE users SET sheet_id = :sheetID WHERE users . id = :id';
        $sth = self::$connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['sheetID' => $id, ':id' => $user_id]);
    }
    public static function addSheetName(string $sheetName, string $user_id, $string){
        self::init($string);
        $sql = 'UPDATE users SET sheet_name = :sheetName WHERE users . id = :id';
        $sth = self::$connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([':sheetName' => $sheetName, ':id' => $user_id]);
    }
    public static function addSheetNameAndID(array $get, string $user_id, $string){
        self::addSheetName($get['sheet'], $user_id, $string);
        self::addSpreadSheetID($get['spreadsheetID'], $user_id, $string);
    }
    public static function changeUserData(string $username, string $password, string $sheet_id, string $sheet_name, $string){
        self::init($string);
        $sql = 'UPDATE users SET username = :username, password = :password, sheet_id = :sheetID, sheet_name = :sheetName WHERE users.id = 2 ';
        $sth = self::$connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([':username' => $username, ':password' => $password, ':sheetID' => $sheet_id, ':sheetName' => $sheet_name]);
    }
    public static function getUserPassword($string){
        self::init($string);
        $sql = 'SELECT `password` FROM `users` WHERE id = ' . $_SESSION['user_id'];
        return (self::$connection->query($sql))->fetchAll();
    }
}