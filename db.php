<?php

$host = "localhost"; // Replace with your actual database host
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$database = "school_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
