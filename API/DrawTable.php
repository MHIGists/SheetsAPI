<?php


class DrawTable
{
    public function __construct(array $values)
    {
        $last = count($values[0]);
        echo "<table><tr>";
        foreach ($values[0] as $value) {
            echo "<th>" . $value . "</th>";
        }
        echo "</tr>";
        for ($i = 1; $i < $last; $i++) {
            echo "<tr>";
            foreach ($values[$i] as $value) {
                echo "<td id='$value'>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}