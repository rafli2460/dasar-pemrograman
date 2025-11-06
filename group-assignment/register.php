<?php
session_start();
include_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    $check_user_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($mysqli, $check_user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        echo "Username already exists.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($mysqli, $insert_query)) {
        header("Location: index.php?message=Registration successful. Please login.");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
    }
}
?>