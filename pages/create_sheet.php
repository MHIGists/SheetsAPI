<?php

use Sheets\API\Client;
use Sheets\API\CreateSheet;

include_once 'parts/header.php';
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
include_once 'parts/footer.php';