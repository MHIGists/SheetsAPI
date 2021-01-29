<?php
error_reporting(0);
include "../load.php";
if (!empty($_GET['range'])){
    new GetInRange(false);
}else{
    include "../frontend/header.php"
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
        <button onclick="clickSearch()">Потърси</button>
    </form>
    <script src="../includes/app.js"></script>
<?php
    include "../frontend/footer.php";
}

