<?php
session_start();
include_once("config/db.php");

/* This block of code is checking if the form data is being submitted using the POST method. It then
retrieves the values of the username, password, and confirm_password fields from the POST data. */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

/* This block of code is checking if the password entered in the password field matches the password
entered in the confirm password field. If the passwords do not match, it will output the message
"Passwords do not match." and then exit the script, preventing further execution of the code related
to user registration. This is a common validation step to ensure that users correctly confirm their
passwords during the registration process. */
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

/* The line `     = password_hash(, PASSWORD_DEFAULT);` is generating a hashed
version of the user's password using PHP's `password_hash` function. */
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

/* The line `     = "INSERT INTO users (username, password) VALUES ('',
'')";` is constructing an SQL query that will insert a new record into the `users`
table in the database. */
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
/* This block of code is responsible for executing the SQL query to insert a new user record into the
`users` table in the database. Here's a breakdown of what it does: */
    if (mysqli_query($mysqli, $insert_query)) {
        header("Location: index.php?message=Registration successful. Please login.");
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
    }
}
?>