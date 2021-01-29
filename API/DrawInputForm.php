<?php


class DrawInputForm
{
    public function __construct(array $values, $range)
    {
        $last = count($values);
        echo "<form action='../backend/edit.php'>";
        echo "<input type='text' name='range' value='$range' hidden>";
        echo "<input type='text' name='values' id='values' hidden>";
        for ($i=0;$i < $last;$i++){
            foreach ($values[$i] as $value) {
                echo "
                    <label>
                    Промени стойността на $value
                    <input type='text' required>
                    </label><br>
                    ";
            }
        }
        echo "<button type='submit' onclick='createQuery()'>Промени</button></form>";

    }
}