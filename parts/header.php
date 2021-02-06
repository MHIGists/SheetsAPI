<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sheets API</title>
    <link rel="stylesheet" href="includes/css/bootstrap.css">
    <link rel="stylesheet" href="includes/css/app.css">
</head>
<body>
<div class="navbar-nav-scroll" id="top-bar">
    <div class="container" id="container-top-bar">
        <ul class="navbar-nav bd-navbar-nav flex-row">
            <li class="nav-item">
                <a onclick="location.href = location.protocol + '//' + location.host + '/index.php?logout=true';" id="logout" class="nav-link">
                    Logout
                </a>
            </li>
            <li class="nav-item">
                Hello <?php echo(\Sheets\Utils::isLoggedIn() ? $_SESSION['user_name'] : 'guest') ?>!
            </li>
        </ul>
    </div>
</div>

<div class="container">
