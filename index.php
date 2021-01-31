<?php
include_once "frontend/header.php";
include_once "load.php";
Utils::startSession();
if (Utils::isLoggedIn()) {
    if (Utils::checkGetData($_GET)) {
        Utils::setGetData($_GET);
    }
    if (Utils::checkIDAndName($_SESSION)) {
        ?>
        <input type="text" id="data"
               value="<?php echo "?ID=" . $_GET['spreadsheetID'] . "&sheet=" . $_GET['sheet'] ?>"
               hidden>
        <a href="backend/get_whole.php">Принтирай цялата таблица</a><br>
        <a href="backend/in_range.php">Извади в област</a><br>
        <a href="backend/edit_in_range.php">Промени стойност/и в определена област</a><br>
    <?php
    }else{
        include_once "frontend/logged_in_index.php";
    }
} else {
    include_once "frontend/log_in_index.php";
}
if (!Utils::isLoggedIn() && Utils::checkPostData($_POST)) {
    $string = SETTINGS;
    PDOConnect::init($string);
    $response = PDOConnect::userExists($_POST['username'], $_POST['pass'], $string);
    if ($response != false) {
        Utils::setLoggedIn(true);
        Utils::setSessionData($response);
    }
}


include_once "frontend/footer.php";