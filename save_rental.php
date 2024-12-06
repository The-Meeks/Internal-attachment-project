<?php
// Establish a connection to your MySQL database
$hostname = "localhost";
$dbUser="root";
$dbPassword="";
$dbName = "storage_unit";

$conn = mysqli_connect($hostname,$dbUser,$dbPassword,$dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form data

?>
