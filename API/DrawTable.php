<?php


class DrawTable
{
    public function __construct(array $values)
    {
        $last = max(count($values[0]), count($values));
        $alphabet = range('A', 'Z');
        echo "<table><tr>";
        echo "<th>" . " " . "</th>";
        foreach ($values[0] as $key => $value) {
            echo "<th>" . $alphabet[$key] . "</th>";
        }
        echo "</tr>";
        for ($i = 0; $i < $last; $i++) {
            echo "<tr>";
            echo "<td><b>" . ($i+1) . "</b></td>";
            foreach ($values[$i] as $value) {
                    echo "<td id='$value'>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}