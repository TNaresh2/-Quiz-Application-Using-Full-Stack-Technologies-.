<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect to database. " . $e->getMessage());
}
?>
