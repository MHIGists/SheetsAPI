<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sheets API</title>
    <link rel="stylesheet" href="includes/css/bootstrap.css">
    <link rel="stylesheet" href="includes/css/app.css">
</head>
<body>
<div class="container">
    <div class="fixed-top">
        <button onclick="location.href = location.protocol + '//' + location.host + '/index.php?logout=true';">Logout</button>
        <div>Hello <?php echo (\Sheets\Utils::isLoggedIn() ? $_SESSION['user_name'] : 'guest')?>!</div>
    </div>
