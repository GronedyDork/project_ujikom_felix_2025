<?php session_start();?>
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
        <h1><a href="index.php">GronedyDork</a></h1>
        <?php 
        if (isset($_SESSION["usernameInput"])){
            ?>
            <span class="fl-right"><?php echo $_SESSION["usernameInput"]; ?></span>
            <a href="datasheet.php">Test</a>
            <a href="functions/logout.php">Log out</a>
            <?php
        } else {
            ?>
            <a href="login.php">Login</a>
            <?php
        }
        ?>
    </div>
    <div class="content">
        <div class="search-bar">
            <input type="text" placeholder="Search..." class="search-input">
        </div>
        <div class="item-catalog">
            <?php
            include 'functions/config.php';
            $sql = "select * from product_list order by ProductID asc";
            $result = mysqli_query($connect,$sql);
            $no = 0;
            while ($data = mysqli_fetch_array($result)) {
                $no++;
                ?>
                <div class="item-container" onclick="window.location.href='item_preview.php?ProductID=<?php echo htmlspecialchars($data['ProductID']); ?>'">
                    <img src="assets/placeholder-img.png" alt="placeholder">
                    <div class="desc">
                        <span class="item-name"><?php echo $data['ProductName']?></span>
                        <span class="stock"><?php echo $data['ProductStock']?> in stock</span>
                        <span class="price">Rp. <?php echo $data['ProductPrice']?></span>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>