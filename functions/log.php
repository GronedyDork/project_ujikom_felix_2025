<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Form Variables, such as name and password
  $usernameInput = $_POST["usernameInput"];
  $passwordInput = $_POST["passwordInput"];

  // Checks for existing names
  $query = "SELECT * FROM `users_account_list` WHERE AccountName = ?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param("s", $usernameInput);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    $hashed_passwordInput = $userData["AccountPassword"];
    if (password_verify($passwordInput, $hashed_passwordInput)) {
      session_start();
      $_SESSION["usernameInput"] = $usernameInput;
      header("Location: ../index.php");
      exit;
    } else { $error = "Invalid username or password"; }
  } else { $error = "Username not found!"; }
}
?>

<?php if (isset($error)) { ?>
  <script> // Isset is used to detect if the variable error has a value.
    alert("<?php echo $error; ?>");
    window.location.href = "../login.php";
  </script>
<?php } ?>