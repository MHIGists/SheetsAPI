<?php
error_reporting(0);
include "../frontend/header_1.php";
include "../load.php";
if (!empty($_GET['range'])){
    new GetInRange(false,true);
}else{
    ?>
    <form>
        <label>
            От област:
            <input  type="text" id="range1">
        </label>
        <label>
            До област:
            <input type="text" id="range2">
        </label>
        <input name="range" type="text" id="range" hidden>
        <input name="sheet" type="text" value="<?php echo $_GET['sheet']?>" hidden>
        <input name="ID" type="text" value="<?php echo $_GET['ID']?>" hidden>
        <button onclick="clickSearch()">Потърси</button>
    </form>
    <?php
}
include "../frontend/footer_2.php";