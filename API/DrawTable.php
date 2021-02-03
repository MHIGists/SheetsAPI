<?php

namespace Sheets\API;
class DrawTable
{
    public function __construct(array $values)
    {
        $alphabet = range('A', 'Z');
        echo "<table><tr>";
        echo "<th>" . " " . "</th>";
        foreach ($values[0] as $key => $value) {
            echo "<th>" . $alphabet[$key] . "</th>";
        }
        echo "</tr>";
        foreach ($values as $i => $iValue) {
            echo "<tr>";
            echo "<td><b>" . ($i+1) . "</b></td>";
            foreach ($iValue as $value) {
                    echo "<td id='$value'>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}