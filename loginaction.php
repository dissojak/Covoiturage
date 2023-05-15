<?php 
  require_once('accounts.php');
  session_start();
  $acc=new accounts();
$acc->acc_username=$_POST['username'];
$acc->acc_pw=$_POST['pw'];

// Validate the username and pw
if ($acc->verifyLogin($acc->acc_username,$acc->acc_pw)) {
  // Sacc the user as authenticated
  $_SESSION['username'] = $acc->acc_username;
  header('Location: accueil.php');
  exit();
  } 
  else {
  // Invalid username or pw
  $error = "Invalid username or password. Please try again.";
}
?> 

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
</head>
<body>
  <div>
    <h2>Login</h2>
    <?php if (isset($error)) : ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="loginaction.php" method="post">
      <label for="username">acc_Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="pw">Password:</label>
      <input type="password" id="pw" name="pw" required>
      
      <input type="submit" value="Login">
    </form>
  </div>
</body>
</html>