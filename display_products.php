<?php
require_once("db_connection.php"); // Include your database connection code
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .products {
            display: flex;
        }

        .product {
            margin-right: 10px; /* Add spacing between products */
        }
    </style>
</head>
<body>
    <div class="products">
    <?php
    $query = "SELECT * FROM products";
    $result = $dbConnection->query($query);

    while ($product = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='" . $product["image_path"] . "' alt='" . $product["name"] . "' style='width: 320px; height: 330px;'>"; // Set the desired width and height here
        echo "<p>" . $product["name"] . "</p>";
        echo "<p>$" . $product["price"] . "</p>";
        echo "</div>";
    }

    // Close the database connection
    $dbConnection->close();
    ?>
    </div>
</body>
</html>
