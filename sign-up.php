<?php include 'functions/config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/common.style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="header">
        <h1><a href="index.php">GronedyDork</a></h1>
    </div>
    <form action="functions/register.php" method="POST">
        <div class="content input-form">
            <h1>Sign Up</h1>
            <input type="text" placeholder="Enter Username" name="usernameInput" required>
            <input type="password" placeholder="Enter Password" name="passwordInput" required>
            <a href="login.php">Log in to a existing account</a>
            <button type="submit">Sign Up</button>
            <button onclick="window.location.href = 'index.php'">Cancel</button>
        </div>
    </form>
</body>
</html>