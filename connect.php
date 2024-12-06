<?php
    $hostname = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "storage_unit";

    $conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);

    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
