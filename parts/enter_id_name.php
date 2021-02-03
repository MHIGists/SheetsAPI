<form action="index.php">
        <label>
        <span>Въведи ID на таблица. Например https://docs.google.com/spreadsheets/d/1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg/edit#gid=0 <br>
           тук 1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg е ID-то на таблицата</span><br>
            <input type="text" value="<?php echo $_SESSION['sheet_id']?>" name="spreadsheetID" placeholder="1tS6Oi927Uas5uWhFsj809C-ibtCHuB13szS0tDM8OYg">
        </label><br>
        <label>
            <span>Въведи име на таблицата може да се намери на дъното на Spreadsheet-a</span><br>
            <input type="text" <?php echo $_SESSION['sheet_name']?> name="sheet" placeholder="Sheet1">
        </label><br>
        <button type="submit">Въведи</button>
    </form>