<?php
require_once("db_connection.php"); // Include your database connection code
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image_path = "images/"; // Directory where images will be stored
    $imageFile = $image_path . basename($_FILES["image"]["name"]);

    if ($_FILES["image"]["error"] > 0) {
        echo "File upload error: " . $_FILES["image"]["error"];
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imageFile)) {
            // Image upload successful
            $query = "INSERT INTO products (name, price, image_path) VALUES (?, ?, ?)";
            $stmt = $dbConnection->prepare($query);
            $stmt->bind_param("sds", $name, $price, $imageFile);

            if ($stmt->execute()) {
                echo "Product added successfully.";
            } else {
                echo "Error adding product to the database: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error uploading image.";
        }
    }
}

// Close the database connection
$dbConnection->close();
?>
