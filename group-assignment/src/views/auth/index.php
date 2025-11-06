<!DOCTYPE html>
<html>
<head>
    <title>Login & Register</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>

<div class="container">
    <div class="tab-buttons">
        <button class="tab-link active" onclick="openForm(event, 'login')">Login</button>
        <button class="tab-link" onclick="openForm(event, 'register')">Register</button>
    </div>

    <div id="login" class="form-container active">
        <h2>Login</h2>
        <form action="/login" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>

    <div id="register" class="form-container">
        <h2>Register</h2>
        <form action="/register" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" value="Register">
        </form>
    </div>

    <script>
        function openForm(evt, formName) {
            var i, formContainer, tabLinks;
            formContainer = document.getElementsByClassName("form-container");
            for (i = 0; i < formContainer.length; i++) {
                formContainer[i].style.display = "none";
            }
            tabLinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" active", "");
            }
            document.getElementById(formName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

</div>

</body>
</html>