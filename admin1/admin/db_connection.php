<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'quiz';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
