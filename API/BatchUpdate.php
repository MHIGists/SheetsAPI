<?php


class BatchUpdate
{
    private $service = null;
    public function __construct()
    {
        $this->service = Client::getInstance()->getService();
    }
    public function batchUpdateValues($spreadsheetId, $range, $valueInputOption, $_values)
    {
        $service = $this->service;
        // [START sheets_batch_update_values]
        $values = [
            [
                // Cell values ...
            ],
            // Additional rows ...
        ];
        // [START_EXCLUDE silent]
        $values = $_values;
        // [END_EXCLUDE]
        $data = [];
        $data[] = new Google_Service_Sheets_ValueRange([
            'range' => $range,
            'values' => $values
        ]);
        // Additional ranges to update ...
        $body = new Google_Service_Sheets_BatchUpdateValuesRequest([
            'valueInputOption' => $valueInputOption,
            'data' => $data
        ]);
        $result = $service->spreadsheets_values->batchUpdate($spreadsheetId, $body);
        printf("%d cells updated.", $result->getTotalUpdatedCells());
        // [END sheets_batch_update_values]
        return $result;
    }
}