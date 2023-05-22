<?php
session_start();

// Retrieve the username from the session
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Account Page</title>
</head>
<body>
  <h2>Welcome to Your Account</h2>
  
  <p>Hello, <?php echo $username; ?>!</p>
</body>
</html>
