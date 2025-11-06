<?php
/* `session_start();` is a PHP function that starts a new session or resumes the existing session. It
initializes session data and allows you to store and retrieve values across multiple pages of a
website. */
session_start();
/* `session_unset();` is a PHP function that is used to remove all variables from the session. It
clears all session data, but keeps the session itself intact. */
session_unset();
/* `session_destroy();` is a PHP function that is used to destroy all data registered to a session. It
effectively ends the current session and deletes all session data. */
session_destroy();
/* The `header("Location: index.php");` function in PHP is used to redirect the user to a different
page. In this case, it is redirecting the user to the `index.php` page after the session data has
been cleared and destroyed. This is a common practice to redirect users to a specific page after
performing certain actions, such as logging out or resetting session data. */
header("Location: index.php");
exit;
?>