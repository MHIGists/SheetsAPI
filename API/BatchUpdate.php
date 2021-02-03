<?php

namespace Sheets\API;

use Google_Service_Sheets_BatchUpdateValuesRequest;
use Google_Service_Sheets_ValueRange;

class BatchUpdate
{
    private $service = null;
    public function __construct()
    {
        $this->service = Client::getService();
    }
    public function batchUpdateValues($spreadsheetId, $range, $valueInputOption, $_values)
    {
        $service = $this->service;
        // Array example
        $values = [
            [
                // Cell values ...
            ],
            // Additional rows ...
        ];
        $values = $_values;
        $data = [];
        $data[] = new Google_Service_Sheets_ValueRange([
            'range' => $range,
            'values' => $values
        ]);
        $body = new Google_Service_Sheets_BatchUpdateValuesRequest([
            'valueInputOption' => $valueInputOption,
            'data' => $data
        ]);
        $result = $service->spreadsheets_values->batchUpdate($spreadsheetId, $body);
        $string = $result->getTotalUpdatedCells() . "cells updated";
        echo "<div class='info'>$string</div>";
        return $result;
    }
}