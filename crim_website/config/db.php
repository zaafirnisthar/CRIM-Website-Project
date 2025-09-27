<?php
$host = "localhost";
$user = "root"; // XAMPP default MySQL user
$pass = "";     // XAMPP default has no password
$db   = "crim_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
