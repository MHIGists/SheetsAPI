<?php

class EditDataInRange
{

    public function __construct()
    {
        new GetInRange(false);
        $range = $_GET['range'];
        $val_arr = explode( ":", $_GET['values']);
        $val_arr = array_values(array_filter($val_arr));
        $dimensions = explode(':',$range);
        $dimensionA = (ord(strtoupper($dimensions[1][0])) - ord(strtoupper($dimensions[0][0])) + 1);
        $dimensionB = $dimensions[1][1];
        $values = [];
        $index = 0;
        for ($i =0;$i < $dimensionB;$i++){
            $values[$i] = [];
            for ($j = 0;$j < $dimensionA;$j++){
                $values[$i][] = $val_arr[$index];
                $index++;
            }
        }
        $id = Client::getInstance()->spreadsheetID;
        $update = new BatchUpdate();
        $update->batchUpdateValues($id, $range, "RAW", $values);
    }
}