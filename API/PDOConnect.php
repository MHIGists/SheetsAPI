<?php


class PDOConnect
{
    /**
     * @var PDO
     */
    protected static $connection;
    public function __construct(){}
    public static function init($string){
        if (is_null(self::$connection)){
            $settings = json_decode(file_get_contents($string), true);
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
        $sql = 'INSERT INTO users (id, username, password, sheet_id, sheet_name) VALUES (NULL, :username, :password, NULL, NULL)';
        $sth = self::$connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([':username' => $username, ':password' => $password]);
    }
    public static function addSpreadSheetID(string $id, string $user_id, $string){
        self::init($string);
        $sql = 'UPDATE users SET sheet_id = :sheetID WHERE users . id = :id';
        $sth = self::$connection->prepare($sql, ['sheetID' => $id, ':id' => $user_id]);
        $sth->execute();
    }
    public static function addSheetName(string $sheetName, string $user_id, $string){
        self::init($string);
        $sql = 'UPDATE users SET sheet_name = :sheetName WHERE users . id = :id';
        $sth = self::$connection->prepare($sql, ['sheetID' => $sheetName, ':id' => $user_id]);
        $sth->execute();
    }
}