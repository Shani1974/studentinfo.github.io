<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "firstdata";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>