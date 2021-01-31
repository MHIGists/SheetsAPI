<?php
error_reporting(0);
include "../frontend/header_1.php";
include "../load.php";
Utils::startSession();
if (!empty($_GET['range'])){
    new GetInRange(false,true, $_SESSION['sheet_id']);
}else{
    new GetInRange(true, false, $_SESSION['sheet_id']);
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
        <input name="sheet" type="text" value="<?php echo $_SESSION['sheet_name']?>" hidden>
        <input name="ID" type="text" value="<?php echo $_SESSION['sheet_id']?>" hidden>
        <button onclick="clickSearch()">Промени</button>
    </form>
    <?php
}
include "../frontend/footer_1.php";