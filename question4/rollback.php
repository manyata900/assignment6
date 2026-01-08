<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "company");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Turn OFF auto-commit to start transaction
mysqli_autocommit($conn, false);

try {
    // Step 1: Insert into orders table
    $sql1 = "INSERT INTO orders (customer_name) VALUES ('Sita Rai')";
    if (!mysqli_query($conn, $sql1)) {
        throw new Exception("Failed to insert order");
    }

    // Get inserted order ID
    $order_id = mysqli_insert_id($conn);

    // Step 2: Insert first item
    $sql2 = "INSERT INTO order_items (order_id, product)
             VALUES ($order_id, 'Mobile')";
    if (!mysqli_query($conn, $sql2)) {
        throw new Exception("Failed to insert first item");
    }

    // Step 3: Intentional error (wrong column name)
    $sql3 = "INSERT INTO order_items (order_id, wrong_column)
             VALUES ($order_id, 'Charger')";
    if (!mysqli_query($conn, $sql3)) {
        throw new Exception("Failed to insert second item");
    }

    // If all queries succeed, commit transaction
    mysqli_commit($conn);
    echo "Transaction successful. Data committed.";

} catch (Exception $e) {

    // Rollback if any error occurs
    mysqli_rollback($conn);
    echo "Transaction failed. Rollback executed.<br>";
    echo "Error: " . $e->getMessage();
}

// Turn ON auto-commit again
mysqli_autocommit($conn, true);
mysqli_close($conn);
?>
