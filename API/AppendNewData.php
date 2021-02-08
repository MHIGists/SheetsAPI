<?php

namespace Sheets\API;

use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class AppendNewData
{
    private $service;
    public function __construct(Google_Service_Sheets $service)
    {
        $this->service = $service;
    }
    public function appendValues($spreadsheetId, $range, $valueInputOption,
                                 $_values)
    {
        $service = $this->service;
        $values = [
            [
                // Cell values ...
            ],
            // Additional rows ...
        ];
        $values = $_values;
        // [END_EXCLUDE]
        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => $valueInputOption
        ];
        $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
        printf("%d cells appended.", $result->getUpdates()->getUpdatedCells());
        return $result;
    }
}