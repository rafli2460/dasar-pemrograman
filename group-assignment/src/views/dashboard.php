<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <form action="/logout" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>