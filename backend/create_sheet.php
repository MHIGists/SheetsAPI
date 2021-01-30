<?php
include_once '../load.php';
include_once '../frontend/header_1.php';
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
include_once '../frontend/footer_2.php';