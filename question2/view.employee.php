<?php
include "db.company.php";
$result = mysqli_query($conn, "SELECT * FROM employees");
?>

<h2>Employee List</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th>
        <th>Department</th><th>Salary</th><th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td><?php echo $row['salary']; ?></td>
        <td>
            <a href="edit.employee.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.employee.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
