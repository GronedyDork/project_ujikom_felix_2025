<?php include 'functions/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/common.style.css">
    <title>Login to an existing account | Lobotomy Corporation</title>
</head>
<body>
    <form action="functions/log.php" method="post">
        <div class="content">
            <h1>Login</h1>
            <label for="usernameInput">Insert Username</label>
            <input type="text" placeholder="Enter Username" name="usernameInput" required>
            <label for="usernameInput">Insert Password</label>
            <input type="password" placeholder="Enter Password" name="passwordInput" required>
            <a href="sign-up.php">Create a new account</a>
            <button type="submit">Login</button>
            <button onclick="window.location.href = 'index.php'">Cancel</button>
        </div>
    </form>
</div>
</body>
</html>