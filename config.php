<?php
// ======================================
// GameVerse Database Configuration
// ======================================

$host = "localhost";
$username = "root";
$password = "";
$database = "gameverse";

// Create Database Connection
$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Start User Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>