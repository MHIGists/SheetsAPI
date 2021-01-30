<?php


class DrawInputForm
{
    public function __construct(array $values, $range, string $msg)
    {
        $last = count($values);
        echo "<form action='../backend/edit.php' id='input'>";
        echo "<input type='text' name='range' value='$range' hidden>";
        echo "<input type='text' name='values' id='values' hidden>";
        echo "<input type='text' name='ID' value='{$_GET['ID']}' hidden>";
        echo "<input type='text' name='sheet' value='{$_GET['sheet']}' hidden>";

        for ($i=0;$i < $last;$i++){
            foreach ($values[$i] as $value) {
                echo "
                    <label>
                    $msg $value
                    <input type='text' required>
                    </label><br>
                    ";
            }
        }
        echo "<button onclick='createQuery()'>Промени</button></form>";

    }
}