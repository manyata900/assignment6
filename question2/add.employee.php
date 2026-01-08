<?php
include "db.company.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, email, department, salary)
            VALUES ('$name', '$email', '$department', '$salary')";

    if (mysqli_query($conn, $sql)) {
        echo "Employee added successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Add Employee</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Department: <input type="text" name="department"><br><br>
    Salary: <input type="number" name="salary"><br><br>
    <input type="submit" name="submit" value="Add Employee">
</form>

