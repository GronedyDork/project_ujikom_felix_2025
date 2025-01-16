<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="assets/image/favicon.png">
    <title>Add Stock</title>
    <link rel="stylesheet" href="css/common.style.css">
</head>
<body>
    <?php
    include "<functions/config.php";
    
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Cek apakah ada nilai yang dikirim menggunakan metode GET dengan nama abno_id
    if (isset($_GET['abno_id'])) {
        $abno_id = input($_GET["abno_id"]);
        $sql = "SELECT * FROM `abnormality-table` WHERE abno_id = ?";
        $stmt = mysqli_prepare($kon, $sql);
        mysqli_stmt_bind_param($stmt, "i", $abno_id);
        mysqli_stmt_execute($stmt);
        $hasil = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($hasil);
    }

    // Cek apakah ada kiriman form dari method POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $abno_id = input($_POST["abno_id"]);
        $name = input($_POST["abno_name"]);
        $status = input($_POST["abno_threat"]);

        // Query update data menggunakan prepared statement
        $sql = "UPDATE `abnormality-table` SET 
                abno_name = ?,
                abno_threat = ?
                WHERE abno_id = ?";
        
        $stmt = mysqli_prepare($kon, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $name, $status, $abno_id);
        
        // Mengeksekusi prepared statement
        $hasil = mysqli_stmt_execute($stmt);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query
        if ($hasil) {
            header("Location:abnormality-index.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h1>Configure abno Data</h1>
        <label>Change Abnormality Name</label>
        <input type="text" name="abno_name" value="<?php echo isset($data['abno_name']) ? $data['abno_name'] : ''; ?>" placeholder="Enter Abnormality Name" required />
        <label>Change Abnormality Class</label>
        <input type="text" name="abno_class" value="<?php echo isset($data['abno_class']) ? $data['abno_class'] : ''; ?>" placeholder="Enter Abnormality Class" required />
        
        <label>Change Abnormality Threat Level</label>
        <select name="abno_threat" required>
            <option value="">Select Threat Level</option>
            <option value="Zayin" <?php echo (isset($data['abno_threat']) && $data['abno_threat'] == 'Zayin') ? 'selected' : ''; ?>>Zayin</option>
            <option value="Teth" <?php echo (isset($data['abno_threat']) && $data['abno_threat'] == 'Teth') ? 'selected' : ''; ?>>Teth</option>
            <option value="He" <?php echo (isset($data['abno_threat']) && $data['abno_threat'] == 'He') ? 'selected' : ''; ?>>He</option>
            <option value="Waw" <?php echo (isset($data['abno_threat']) && $data['abno_threat'] == 'Waw') ? 'selected' : ''; ?>>Waw</option>
            <option value="Aleph" <?php echo (isset($data['abno_threat']) && $data['abno_threat'] == 'Aleph') ? 'selected' : ''; ?>>Aleph</option>
        </select>
        
        <input type="hidden" name="abno_id" value="<?php echo isset($data['abno_id']) ? $data['abno_id'] : ''; ?>" />

        <button type="submit" name="submit">Submit</button>
        <button type="reset" name="cancel" onclick="window.location.href = 'abnormality-index.php'">Cancel</button>
    </form>
</body>
</html>