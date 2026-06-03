<?php
define('BASEPATH', '1');
define('ENVIRONMENT', 'development');
require_once 'application/config/database.php';
$db_cfg = $db['default'];
$conn = new mysqli($db_cfg['hostname'], $db_cfg['username'], $db_cfg['password'], $db_cfg['database']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "--- RUNNING SALARY MIGRATION ---\n";

// 1. Add monthly_salary to users table if not exists
$check_column = $conn->query("SHOW COLUMNS FROM users LIKE 'monthly_salary'");
if ($check_column && $check_column->num_rows == 0) {
    $alter = $conn->query("ALTER TABLE users ADD COLUMN monthly_salary DECIMAL(10,2) DEFAULT 0.00 AFTER dob");
    if ($alter) {
        echo "Successfully added monthly_salary column to users table.\n";
    } else {
        echo "Error adding monthly_salary column: " . $conn->error . "\n";
    }
} else {
    echo "Column monthly_salary already exists in users table.\n";
}

// 2. Create salary_payments table
$create_table_sql = "
CREATE TABLE IF NOT EXISTS salary_payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    month_year VARCHAR(20) NOT NULL,
    payment_date DATE NOT NULL,
    payment_mode VARCHAR(50) NOT NULL,
    notes TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

if ($conn->query($create_table_sql)) {
    echo "Successfully created salary_payments table.\n";
} else {
    echo "Error creating salary_payments table: " . $conn->error . "\n";
}

$conn->close();
