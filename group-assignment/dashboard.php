<?php
/* `session_start();` is a PHP function that initializes a new session or resumes an existing session.
Sessions in PHP allow you to store user-specific data across multiple pages or visits to a website. */
session_start();

/* The code block `if (!isset(['username'])) {
    header("Location: index.php");
    exit;
}` is checking if the session variable `['username']` is not set. If the username is not
set in the session, it means that the user is not logged in or authenticated. In that case, the code
redirects the user to the `index.php` page using the `header` function, which sends an HTTP header
to the browser to redirect the user to a different page. The `exit` function is then called to stop
the script execution immediately after the redirection. */
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<!-- /* The line `<h2>Welcome, <?php echo ['username']; ?>!</h2>` is displaying a welcome message
to the user who is currently logged in. It retrieves the username stored in the session variable
`['username']` and dynamically inserts it into the HTML output using PHP. This way, the
user sees a personalized greeting with their username when they access the dashboard page. */ -->
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>