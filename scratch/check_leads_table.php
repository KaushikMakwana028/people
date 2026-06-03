<?php
define('BASEPATH', '1');
define('ENVIRONMENT', 'development');
require_once 'application/config/database.php';
$db_cfg = $db['default'];
$conn = new mysqli($db_cfg['hostname'], $db_cfg['username'], $db_cfg['password'], $db_cfg['database']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "--- RUNNING SQL COUNTS DIRECTLY ---\n";
$total = $conn->query("SELECT COUNT(*) as cnt FROM leads")->fetch_assoc()['cnt'];
$in_progress = $conn->query("SELECT COUNT(*) as cnt FROM leads WHERE status = 'in-progress'")->fetch_assoc()['cnt'];
$converted = $conn->query("SELECT COUNT(*) as cnt FROM leads WHERE status = 'converted'")->fetch_assoc()['cnt'];
$not_interested = $conn->query("SELECT COUNT(*) as cnt FROM leads WHERE status = 'not-interested'")->fetch_assoc()['cnt'];

echo "Total: $total\n";
echo "In Progress: $in_progress\n";
echo "Converted: $converted\n";
echo "Not Interested: $not_interested\n";

$conn->close();
