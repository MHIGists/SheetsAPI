<?php
declare(strict_types=1);
class GetInRange
{
    public function __construct(bool $whole, bool $updateData = false)
    {
        if ($whole === true){
            $range = "A1:Z10000";
        }else{
            $range = $_GET['range'];
        }
        $service = client::getInstance()->getService();
        $id = client::getInstance()->spreadsheetID;
        $response = $service->spreadsheets_values->get($id, $range);
        $values = $response->getValues();
        if (empty($values)) {
            echo "No values";
        } else {
            new DrawTable($values);
        }
        if ($updateData){
            new DrawInputForm($values, $range);
        }
    }
}