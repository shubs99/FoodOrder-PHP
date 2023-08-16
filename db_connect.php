<?php
// Database configuration
$hostname = "localhost"; // Change this to your database hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "orders"; // Change this to your database name

// Create a connection to the database
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optionally, you can set the character set to utf8 for proper encoding support
mysqli_set_charset($connection, "utf8");
?>
