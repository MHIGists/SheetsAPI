<?php
declare(strict_types=1);
class GetInRange
{
    public function __construct(bool $whole, bool $updateData = false, string $spreadsheetID = '')
    {
        $sheetName = 'Sheet1!';
        if (!empty($_GET['range'])){
            $range = $_GET['range'];
        }
        if ($whole){
            $range = $_GET['sheet'] . "!a1:z10000";
        }
        $id = !empty($_GET['ID']) ? $_GET['ID']: Client::getSpreadsheetID();
        $service = Client::getService($id, $sheetName);
        $response = $service->spreadsheets_values->get($id, $range);
        $values = $response->getValues();
        if (empty($values)) {
            echo "No values";
        } else {
            new DrawTable($values);
        }
        if ($updateData){
            new DrawInputForm($values, $range, "Промени стойността на: ");
        }
    }
}