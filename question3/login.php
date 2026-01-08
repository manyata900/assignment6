<?php
session_start();
include "db.register.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn,
        "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid email or password";
    }
}
?>

<h2>User Login</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" name="login" value="Login">
</form>
