<?php
declare(strict_types=1);
namespace Sheets\API;
class GetInRange
{
    public function __construct(bool $whole, bool $updateData = false, string $spreadsheetID = '')
    {
        $sheetName = $_SESSION['sheet_name'];
        if (!empty($_GET['range'])){
            $range = $sheetName .'!'.$_GET['range'];
        }
        if ($whole){
            $range = $_SESSION['sheet_name'] . "!a1:z10000";
        }
        $id = !empty($_SESSION['sheet_id']) ? $_SESSION['sheet_id']: Client::getSpreadsheetID();
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