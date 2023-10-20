<?php
// Include your database connection code (e.g., db_connection.php)
require_once("db_connection.php"); // Include your database connection code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform any necessary data validation and sanitation here

    // Create a SQL query to insert the user data into the "registration" table
    $query = "INSERT INTO registration (email, password) VALUES (?, ?)";

    // Prepare and execute the query
    $stmt = $dbConnection->prepare($query);
    $stmt->bind_param("ss", $email, $password); // Assumes email and password are both strings

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    // Close the database connection and the prepared statement
    $stmt->close();
    $dbConnection->close();
} else {
    // Handle cases where the form wasn't submitted via POST
    // You can redirect or display an error message
}
?>
