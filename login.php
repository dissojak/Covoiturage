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
      <br/>
      <label for="pw">Password:</label>
      <input type="password" id="pw" name="pw" required>
      <br/>
      <input type="submit" value="Login">
      <button class="signup-button" onclick="location.href='signup.php';">Sign Up</button>
    </form>
  </div>
</body>
</html>
