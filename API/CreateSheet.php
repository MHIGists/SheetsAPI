<?php

namespace Sheets\API;
use Google_Service_Sheets;
use Google_Service_Sheets_Spreadsheet;
class CreateSheet
{
    private $service;
    public function __construct(Google_Service_Sheets $service)
    {
        $this->service = $service;
    }

    public function create($title)
    {
        $service = $this->service;
        // [START sheets_create]
        $spreadsheet = new Google_Service_Sheets_Spreadsheet([
            'properties' => [
                'title' => $title
            ]
        ]);
        $spreadsheet = $service->spreadsheets->create($spreadsheet, [
            'fields' => 'spreadsheetId'
        ]);
        echo "<div class='info'>Sheet $title created!</div>";
        return $spreadsheet->spreadsheetId;
    }
}