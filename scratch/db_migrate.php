<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'vision-people';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_file = 'C:/Users/Rohit Balani/.gemini/antigravity/brain/d57150ea-8d60-4a56-8838-bbec60d74603/product_leads.sql';
if (!file_exists($sql_file)) {
    die("SQL file not found at " . $sql_file);
}

$sql = file_get_contents($sql_file);

if ($conn->multi_query($sql)) {
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    echo "Migration completed successfully!\n";
} else {
    echo "Error executing queries: " . $conn->error . "\n";
}

$conn->close();
?>
