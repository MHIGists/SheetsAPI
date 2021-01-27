<?php
error_reporting(0);
include "GetInRange.php";
if (!empty($_GET['range'])){
    new GetInRange(false);
}else{
    include"header.php"
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
    <script src="app.js"></script>
<?php
    include "footer.php";
}

