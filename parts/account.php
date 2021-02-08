<form method="get" class="form-control">
    <label>
        Username:
        <input type="text" name="user_name" value="<?php echo $_SESSION['user_name']?>" class="form-control">
    </label>
    <label>
        Password:
        <input type="text" name="password" value="<?php echo \Sheets\API\PDOConnect::getUserPassword(\Sheets\Utils::$SETTINGS)[0]['password']?>" class="form-control">
    </label>
    <label>
        Sheet ID:
        <input type="text" name="sheet_id" value="<?php echo $_SESSION['sheet_id']?>" class="form-control">
    </label>
    <label>
        Sheet Name:
        <input type="text" name="sheet_name" value="<?php echo $_SESSION['sheet_name']?>" class="form-control">
    </label>
    <button type="submit">Save changes</button>
</form>