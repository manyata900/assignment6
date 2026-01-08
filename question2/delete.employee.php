<?php
include "db.company.php";

$id = $_GET['id'];
$sql = "DELETE FROM employees WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: view.employee.php");
} else {
    echo "Error deleting record";
}
?>
