<?php session_start(); ?>
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
    <div class="tab">
        <button class="tablink" onclick="openTab(event, 'datasheet-product')">Products</button>
        <button class="tablink" onclick="openTab(event, 'datasheet-account')">Accounts</button>
    </div>
    <div class="content tabcontent" id="datasheet-product">
        <table class="datasheet-table">
            <tr class="table-header">
                <th class="col number">No</th>
                <th class="col">Product Name</th>
                <th class="col">Product Price</th>
                <th class="col">Product Stock</th>
                <th class="col">Options</th>
            </tr>

            <?php
            include "functions/config.php";
            $sql = "select * from product_list order by ProductID asc";
            $result = mysqli_query($connect,$sql);
            $no = 0;
            while ($data = mysqli_fetch_array($result)) {
                $no++;
                ?>
                <tr class="row">
                    <td class="col number"><?php echo $no;?></td>
                    <td><?php echo $data["ProductName"];?></td>
                    <td><?php echo $data["ProductPrice"];?></td>
                    <td><?php echo $data["ProductStock"];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <div class="content tabcontent" id="datasheet-account">
        <table class="datasheet-table">
            <tr class="table-header">
                <th class="col number">No</th>
                <th class="col">Account Name</th>
                <th class="col">Account Permission</th>
                <th class="col">Options</th>
            </tr>

            <?php
            include "functions/config.php";
            $sql = "select * from users_account_list order by AccountID asc";
            $result = mysqli_query($connect,$sql);
            $no = 0;
            while ($data = mysqli_fetch_array($result)) {
                $no++;
                ?>
                <tr class="row">
                    <td class="col number"><?php echo $no;?></td>
                    <td><?php echo $data["AccountName"];?></td>
                    <td><?php echo $data["AccountPermission"];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <script>
    function openTab(event, tabName) {
    var i, tabcontent, tablink;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablink = document.getElementsByClassName("tablink");
    for (i = 0; i < tablink.length; i++) {
        tablink[i].className = tablink[i].className.replace(" active", "");
    }
    
    document.getElementById(tabName).style.display = "block";
    event.currentTarget.className += " active";
    }
    </script>
</body>
</html>