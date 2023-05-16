<?php 
  require_once('accounts.php');
  session_start();
  $acc=new accounts();
$acc->acc_username=$_POST['username'];
$acc->acc_pw=$_POST['pw'];

// Validate the username and pw
if ($acc->verifyLogin($acc->acc_username, $acc->acc_pw)) {
  // Sacc the user as authenticated
  $_SESSION['username'] = $acc->acc_username;
  $role = $acc->selectRole($acc->acc_username); // Store the role in a variable
  
  if ($role == 'user') {
      header('Location: ShowLocation.php');
      exit();
  } elseif ($role == 'owner') {
      header('Location: AddLocation.php');
      exit();
  } 
} else {
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <form action="loginaction.php" method="post">
    <h2>Login</h2>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="pw">Password:</label>
      <input type="password" id="pw" name="pw" required>
      
      <input type="submit" value="Login">
      <?php if (isset($error)) : ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    </form>
  </div>
</body>
</html>