<?php
error_reporting(0);
include "../load.php";
Utils::startSession();
if (!empty($_GET['range'])){
    new GetInRange(false, false, $_GET['ID']);
}else{
    include "../frontend/header_1.php";
    new GetInRange(true, false, $_GET['ID']);
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
    <script src="../includes/app.js"></script>
<?php
    include "../frontend/footer_2.php";
}

