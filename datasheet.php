<?php
session_start();
?>
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
        <h1>Datasheet</h1>
    </div>
    <div class="content">
        <p>Product Datasheet</p>
        <table class="datasheet-table">
            <tr class="table-header">
                <th class="number-col">No</th>
                <th class="name-col">Product Name</th>
                <th class="options-col">Product Price</th>
                <th class="options-col">Product Stock</th>
                <th class="options-col">Options</th>
            </tr>

            <?php
            include "functions/config.php";
            $sql = "select * from product_list order by ProductID asc";
            $result = mysqli_query($connect,$sql);
            $no = 0;
            while ($data = mysqli_fetch_array($result)) {
                $no++;
                ?>
                <tr>
                    <td class="number-col"><?php echo $no;?></td>
                    <td><?php echo $data["ProductName"];?></td>
                    <td><?php echo $data["ProductPrice"];?></td>
                    <td><?php echo $data["ProductStock"];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="content">
        <p>Account Datasheet</p>
        <table class="datasheet-table">
            <tr class="table-header">
                <th class="number-col">No</th>
                <th class="name-col">Account Name</th>
                <th class="options-col">Account Permission</th>
                <th class="options-col">Options</th>
            </tr>

            <?php
            include "functions/config.php";
            $sql = "select * from users_account_list order by AccountID asc";
            $result = mysqli_query($connect,$sql);
            $no = 0;
            while ($data = mysqli_fetch_array($result)) {
                $no++;
                ?>
                <tr>
                    <td class="number-col"><?php echo $no;?></td>
                    <td><?php echo $data["AccountName"];?></td>
                    <td><?php echo $data["AccountPermission"];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>