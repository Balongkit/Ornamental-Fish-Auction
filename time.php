<?php
require_once 'connection.php';

// Assuming you have a product_id to identify the specific product
$product_id = $_POST['product_id']; // Adjust this according to your actual form data

// Assuming you want to decrement the time by 1 minute
$decrement_minutes = 1;

// Fetch the current time from the database
$sql_select = "SELECT time FROM product WHERE product_id = $product_id";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_time = $row['time'];

    // Decrement the time by the specified minutes
    $new_time = date('H:i:s', strtotime("-$decrement_minutes minutes", strtotime($current_time)));

    // Update the database with the new time
    $sql_update = "UPDATE product SET time = '$new_time' WHERE product_id = $product_id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Bid time decremented successfully')</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Product not found";
}

$conn->close();
?>
