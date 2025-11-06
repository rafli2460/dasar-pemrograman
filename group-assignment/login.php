<?php
session_start();
include_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
/* The lines `     = ['username'];` and ` = ['password'];` are retrieving
the values of the `username` and `password` fields from a POST request. In a typical login form,
these values are submitted by the user through an HTML form using the POST method. The ``
superglobal in PHP is used to collect form data sent with the POST method. */
    $username = $_POST['username'];
    $password = $_POST['password'];

    /* The line ` = "SELECT * FROM users WHERE username=''";` is constructing
    a SQL query to retrieve all columns (`*`) from the `users` table where the `username` column
    matches the value stored in the `` variable. This query is used to check if a user with
    the provided username exists in the database. */
    $check_user_query = "SELECT * FROM users WHERE username='$username'";
    /* The line ` = mysqli_query(, );` is executing a MySQL database
    query using the `mysqli_query` function in PHP. */
    $result = mysqli_query($mysqli, $check_user_query);
    /* ` = mysqli_fetch_assoc();` is fetching the result row as an associative array from
    the executed SQL query stored in the `` variable. */
    $user = mysqli_fetch_assoc($result);

    /* This block of code is handling the authentication process after retrieving the user information from
    the database. Here's a breakdown of what it does: */
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        header("Location: index.php?error=Invalid username or password.");
    }
}
?>