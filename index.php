<?php
include_once "frontend/header.php";
include_once "load.php";
if (!empty($_GET['spreadsheetID']) && !empty($_GET['sheet'])){
    ?>
    <input type="text" id="data" value="<?php echo "?ID=" . $_GET['spreadsheetID'] . "&sheet=" . $_GET['sheet'] ?>" hidden>
    <a href="backend/get_whole.php" >Принтирай цялата таблица</a><br>
    <a href="backend/in_range.php"  >Извади в област</a><br>
    <a href="backend/edit_in_range.php" >Промени стойност/и в определена област</a><br>
    <a href="backend/create_sheet.php">Създай нова таблица</a>
        <?php
}else{?>
    <form action="index.php">
        <label>
        <span>Въведи ID на таблица. Например https://docs.google.com/spreadsheets/d/1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg/edit#gid=0 <br>
           тук 1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg е ID-то на таблицата</span><br>
            <input type="text" name="spreadsheetID" placeholder="1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg">
        </label><br>
        <label>
            <span>Въведи име на таблицата може да се намери на дъното на Spreadsheet-a</span><br>
            <input type="text" name="sheet" placeholder="Sheet1">
        </label><br>
        <button type="submit">Въведи</button>
    </form>
    <?php
}
include_once "frontend/footer.php";