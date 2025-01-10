<?php include 'functions/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/common.style.css">
    <title>Sign Up</title>
</head>
<body>
    <form class="modal-content" action="functions/register.php" method="POST">
        <div class="content">
            <h1>Sign Up</h1>
            <div class="container">
            <label for="usernameInput">Username</label>
            <input type="text" placeholder="Enter Username" name="usernameInput" required>
            <label for="passwordInput">Password</label>
            <input type="password" placeholder="Enter Password" name="passwordInput" required>
            <a href="login.php">Log in to a existing account</a>
            <button type="submit">Sign Up</button>
            <button onclick="window.location.href = 'index.php'">Cancel</button>
        </div>
    </form>
</body>
</html>