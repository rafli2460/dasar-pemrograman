<?php
session_start();
include_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_user_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli, $check_user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        header("Location: index.php?error=Invalid username or password.");
    }
}
?>