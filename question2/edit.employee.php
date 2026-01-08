<?php
include "db.company.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET
            name='$name',
            email='$email',
            department='$department',
            salary='$salary'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view.employee.php");
    } else {
        echo "Error updating record";
    }
}
?>

<h2>Edit Employee</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>"><br><br>
    Salary: <input type="number" name="salary" value="<?php echo $row['salary']; ?>"><br><br>
    <input type="submit" name="update" value="Update Employee">
</form>


