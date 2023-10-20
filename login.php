<?php
// Include your database connection code (db_connection.php)
require_once("db_connection.php"); // Include your database connection code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get user input from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform any necessary data validation and sanitation here

    // Create a SQL query to check the user's credentials
    $query = "SELECT * FROM registration WHERE email = ? AND password = ?";
    
    // Prepare and execute the query
    $stmt = $dbConnection->prepare($query);
    $stmt->bind_param("ss", $email, $password); // Assumes email and password are both strings

    if ($stmt->execute()) {
        // Check if a matching record was found
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            // Login successful
            echo "Login successful!";
        } else {
            // Invalid email or password
            echo "Invalid email or password.";
        }
    } else {
        // Error in query execution
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Handle cases where the form wasn't submitted via POST
    // You can redirect or display an error message
}
?>
