<?php
/* public/migration.php */

use Dotenv\Dotenv;
use app\migrations\Migration;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "Migration start.<br />";
$mig = new Migration();
$mig->CreateTables();
$mig->InsertTablesData();
echo 'Migration end.';