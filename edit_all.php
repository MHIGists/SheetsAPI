<?php
include "header.php";
include "GetInRange.php";
new GetInRange(true);
?>
<form>
    <label>
        <input type="text" id="cell">
    </label>
    <label>
        <input type="text" id="new_value">
    </label>
    <button type="submit">Промени</button>
</form>
<?php
include "footer.php";