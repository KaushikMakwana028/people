<?php
define('BASEPATH', '1');
define('ENVIRONMENT', 'development');
require_once 'application/config/database.php';
$db_cfg = $db['default'];
$conn = new mysqli($db_cfg['hostname'], $db_cfg['username'], $db_cfg['password'], $db_cfg['database']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "=== VERIFYING SALARY MANAGEMENT DATABASE UPDATES ===\n";

// 1. Check users table columns
$check_column = $conn->query("SHOW COLUMNS FROM users LIKE 'monthly_salary'");
if ($check_column && $check_column->num_rows > 0) {
    echo "[PASS] 'monthly_salary' column exists in 'users' table.\n";
    $col = $check_column->fetch_assoc();
    echo "       Type: " . $col['Type'] . ", Default: " . $col['Default'] . "\n";
} else {
    echo "[FAIL] 'monthly_salary' column does not exist in 'users' table.\n";
}

// 2. Check salary_payments table
$check_table = $conn->query("SHOW TABLES LIKE 'salary_payments'");
if ($check_table && $check_table->num_rows > 0) {
    echo "[PASS] 'salary_payments' table exists.\n";
    
    // Check columns inside salary_payments
    $columns = [];
    $res = $conn->query("SHOW COLUMNS FROM salary_payments");
    while($row = $res->fetch_assoc()) {
        $columns[] = $row['Field'];
    }
    echo "       Columns: " . implode(', ', $columns) . "\n";
} else {
    echo "[FAIL] 'salary_payments' table does not exist.\n";
}

$conn->close();
