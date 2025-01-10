<?php session_start(); include 'functions/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/common.style.css">
</head>
<body>
    <div class="header">
        <h1>GronedyDork</h1>
    </div>
    <div class="content">
        <div class="search-bar">
            <input type="text" placeholder="Search..." class="search-input">
        </div>
        <div class="item-catalog">
            <div class="item-container">
                <img src="assets/placeholder-img.png" alt="placeholder">
                <div class="desc">
                    <span class="item-name">Basic Package for poor people</span>
                    <span class="rating">5 stars</span>
                    <span class="price">Rp. 1.000</span>
                </div>
            </div>
            <div class="item-container">
                <img src="assets/placeholder-img.png" alt="placeholder">
                <div class="desc">
                    <span class="item-name">Plus Package for less poor people</span>
                    <span class="rating">5 stars</span>
                    <span class="price">Rp. 10.000</span>
                </div>
            </div>
            <div class="item-container">
                <img src="assets/placeholder-img.png" alt="placeholder">
                <div class="desc">
                    <span class="item-name">Premium Package for rich people</span>
                    <span class="rating">5 stars</span>
                    <span class="price">Rp. 100.000</span>
                </div>
            </div>
            <div class="item-container">
                <img src="assets/placeholder-img.png" alt="placeholder">
                <div class="desc">
                    <span class="item-name">Ultra Package for people that has the most wealth in the entire world</span>
                    <span class="rating">5 stars</span>
                    <span class="price">Rp. 1.000.000</span>
                </div>
            </div>
        </div>
        <?php 
        if (isset($_SESSION["usernameInput"])){
            echo $_SESSION["usernameInput"];
            ?>
            <a href="datasheet.php">Test</a>
            <a href="functions/logout.php">Log out</a>
            <?php
        } else {
            ?>
            <a href="sign-up.php">Sign Up</a>
            <a href="login.php">Login</a>
            <?php
        }
        ?>
    </div>
</body>
</html>