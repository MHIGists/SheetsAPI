<?php

use Sheets\API\GetInRange;
use Sheets\Utils;

error_reporting(0);
Utils::startSession();
include "parts/header.php";
new GetInRange(true);
include "parts/footer.php";