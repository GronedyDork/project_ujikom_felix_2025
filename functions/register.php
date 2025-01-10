<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form variables like names and passwords, you know the usual
    $usernameInput = $_POST["usernameInput"];
    $passwordInput = $_POST["passwordInput"];

    // Validate the password
    if (strlen($passwordInput) < 8) {
        $error = "Password must be at least 8 characters long";
    } else if (!preg_match("/[a-z]/", $passwordInput)) {
        $error = "Password must contain at least one lowercase letter";
    } else if (!preg_match("/[A-Z]/", $passwordInput)) {
        $error = "Password must contain at least one uppercase letter";
    } else if (!preg_match("/[0-9]/", $passwordInput)) {
        $error = "Password must contain at least one number";
    }

    if (!isset($error)) {
        // Validate password
        $passwordInput = password_hash($passwordInput, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM `users_account_list` WHERE AccountName = '$usernameInput'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Incase the error doesn't give you enough information, this statement detects if there is someone with that name. If there isn't, make a new account. Else, fail.
            $error = "Username already taken";
        } else {
            $query = "INSERT INTO `users_account_list` (AccountName, AccountPassword, AccountPermission) VALUES (?, ?, 'costumer')";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("ss", $usernameInput, $passwordInput);
            $stmt->execute();
            session_start();
            $_SESSION["usernameInput"] = $usernameInput;
            if ($stmt->affected_rows > 0) {
                $success = "Created new account successfully!";
            } else {
                $error = "Error: " . $stmt->error;
            }
        }
    }
}
?>

<!-- Tampilkan pesan kesalahan atau sukses jika ada -->
<?php if (isset($error)) { ?>
    <script>
      alert("<?php echo $error; ?>");
      window.location.href = "../sign-up.php";
    </script>
<?php } elseif (isset($success)) { ?>
    <script>
      alert("<?php echo $success; ?>");
      window.location.href = "../index.php";
    </script>
<?php } ?>