<?php

require_once('../autoload.php');

use JacaDanseBack\Database;

$database = new Database();
$database->connect();
$database->initSchema();
$database->close();

echo 'Init OK';