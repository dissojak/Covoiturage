<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Sign Up</h2>
    <form action="signupaction.php" method="post">
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
      </div>

      <div class="form-group">
        <label for="pr">Prénom:</label>
        <input type="text" class="form-control" id="pr" name="pr" required>
      </div>

      <div class="form-group">
        <label for="cin">CIN:</label>
        <input type="text" class="form-control" id="cin" name="cin" required>
      </div>

      <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" required>
      </div>

      <div class="form-group">
        <label for="tel">Téléphone:</label>
        <input type="tel" class="form-control" id="tel" name="tel" required>
      </div>

      <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role">
          <option value="user">User</option>
          <option value="owner">Owner</option>
        </select>
      </div>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
      </div>

      <input type="submit" class="btn btn-primary" value="Sign Up">
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>
    function validateForm() {
      var password = document.getElementById("password").value;
      var confirm_password = document.getElementById("confirm_password").value;
      
      if (password !== confirm_password) {
        alert("Password and confirmation password do not match.");
        return false;
      }
    }
  </script>
</body>
</html>
