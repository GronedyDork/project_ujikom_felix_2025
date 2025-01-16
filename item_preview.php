<?php session_start(); include 'functions/config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Preview</title>
    <link rel="stylesheet" href="css/common.style.css">
</head>
<body>
    <?php
        include "functions/config.php";
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_GET['ProductID'])) {
            $ProductID = input($_GET["ProductID"]);
            $sql = "SELECT * FROM product_list WHERE ProductID = ?";
            $stmt = mysqli_prepare($connect, $sql);
            mysqli_stmt_bind_param($stmt, "i", $ProductID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $data = mysqli_fetch_assoc($result);
        }
    ?>
    <div class="header">
        <h1><a href="index.php">GronedyDork</a></h1>
    </div>
    <div class="content item-preview">
        <h1><?php echo $data['ProductName'];?></h1>
        <img src="assets/placeholder-img.png" alt="placeholder">
    </div>
</body>
</html>