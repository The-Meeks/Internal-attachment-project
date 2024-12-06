<?php
$servername = "localhost";
$username = "root";
$password = ""; // Add a semicolon here
$db_name = "storage_unit";
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful";
?>
