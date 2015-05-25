<?php

require_once('../autoload.php');

use JacaDanseBack\Database;

$database = new Database();
$database->connect();
$database->dropTables();
$database->close();

echo 'Drop OK';