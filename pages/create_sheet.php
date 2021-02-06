<?php

use Sheets\API\Client;
use Sheets\API\CreateSheet;

if (!empty($_GET['title'])){

    (new CreateSheet(Client::getService()))->create($_GET['title']);
}else{
?>
<form>
    <label>
        Въведи име на новата таблица:
        <input type="text" name="title">
    </label>
    <button type="submit">Създай</button>
</form>
<?php
}
