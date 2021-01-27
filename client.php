<?php


class client
{
    private $client;
    private $service;
    public $spreadsheetID;

    public static $instance;

    public function __construct(string $spreadsheetID = "1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg")
    {

        require __DIR__ . "/vendor/autoload.php";
        $this->client = new Google_Client();
        $this->client->setApplicationName("SheetsAPI project");
        $this->client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $this->client->setAccessType("offline");
        $this->client->setAuthConfig(__DIR__ . '/credentials.json');
        $this->service = new  Google_Service_Sheets($this->client);
        $this->spreadsheetID = $spreadsheetID;
    }

    public function getClient(): Google_Client
    {
        return $this->client;
    }

    public function getService(): Google_Service_Sheets
    {
        return $this->service;
    }

    public static function getInstance(): client
    {
        if (!isset(self::$instance) || empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}