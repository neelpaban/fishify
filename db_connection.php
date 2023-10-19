<?php
$hostname = "localhost"; // Your MySQL host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "ecommerce"; // Your database name (use the same name you created in the database setup step)

// Create a connection to the MySQL database
$dbConnection = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}
?>
