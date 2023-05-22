<?php 
  require_once('../controllers/AccountController.php');
  require_once('../models/Account.php');
  session_start();

  $username=$_POST['username'];
  $pw=$_POST['pw'];
  $AC=new AccountController();

// Validate the username and pw
if ($AC->verifyLogin($username,$pw)) {
  // SAC the user as authenticated
  $_SESSION['username'] = $username;
  $role = $AC->selectRole($username); // Store the role in a variable
  
  if ($role == 'user') {
      header('Location: ShowLocation.php');
      //echo " doneeeeee";
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