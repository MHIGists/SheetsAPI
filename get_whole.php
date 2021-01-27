<?php
require_once "client.php";
$range = "A1:Z1000";
$service = client::getInstance()->getService();
$id = client::getInstance()->spreadsheetID;
$response = $service->spreadsheets_values->get($id, $range);
$values = $response->getValues();
if (empty($values)){
    echo "No values";
}else{
    $last = count($values[0]);
    echo "<table><tr>";
    foreach ($values[0] as $value) {
        echo "<th>" . $value . "</th>";
    }
    echo "</tr>";
    for ($i = 1;$i < $last;$i++){
        echo "<tr>";
        foreach ($values[$i] as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
