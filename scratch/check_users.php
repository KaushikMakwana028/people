<?php
define('BASEPATH', '1');
define('ENVIRONMENT', 'development');
require_once 'application/config/database.php';
$db_cfg = $db['default'];
$conn = new mysqli($db_cfg['hostname'], $db_cfg['username'], $db_cfg['password'], $db_cfg['database']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "--- users TABLE STRUCTURE ---\n";
$res = $conn->query("DESCRIBE users");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        print_r($row);
    }
}
$conn->close();
