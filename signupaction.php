<?php
require_once('Accounts.php');
$acc = new Accounts();
session_start();

$acc->acc_nom = $_POST["nom"];
$acc->acc_prenom = $_POST["pr"];
$acc->acc_cin = $_POST["cin"];
$acc->acc_adresse = $_POST["adresse"];
$acc->acc_tel = $_POST["tel"];
$acc->acc_role = $_POST["role"];
$acc->acc_username = $_POST["username"];
$acc->acc_pw = $_POST["password"];

// Validate the username and password
if ($acc->cinExist($acc->acc_cin)) {
    $cinexist = "CIN already exists!";
} else if ($acc->userExist($acc->acc_username)) {
    $userexist = "Username is already in use!";
} else if ($acc->acc_role == "owner") {
    // Save the user as authenticated
    $_SESSION['username'] = $acc->acc_username;
    $_SESSION['password'] = $acc->acc_pw;
    $_SESSION['nom'] = $acc->acc_nom;
    $_SESSION['prenom'] = $acc->acc_prenom;
    $_SESSION['cin'] = $acc->acc_cin;
    $_SESSION['adresse'] = $acc->acc_adresse;
    $_SESSION['tel'] = $acc->acc_tel;
    $_SESSION['role'] = $acc->acc_role;

    header('Location: ADDVoiture.php');
    exit();
} else {
    // Save the user as authenticated
   
      // $_SESSION['username'] = $acc->acc_username;
      // $_SESSION['password'] = $acc->acc_pw;
      // $_SESSION['nom'] = $acc->acc_nom;
      // $_SESSION['prenom'] = $acc->acc_prenom;
      // $_SESSION['cin'] = $acc->acc_cin;
      // $_SESSION['adresse'] = $acc->acc_adresse;
      // $_SESSION['tel'] = $acc->acc_tel;
      // $_SESSION['role'] = $acc->acc_role;

    $acc->insertUser();

    header('Location: login.php');
    exit();
}
?>

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
    
    <?php if (isset($userexist)) : ?>
      <div class="alert alert-danger"><?php echo $userexist; ?></div>
    <?php endif; ?>

    <?php if (isset($cinexist)) : ?>
      <div class="alert alert-danger"><?php echo $cinexist; ?></div>
    <?php endif; ?>

    <form action="signupaction.php" method="post">
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($acc->acc_nom) ? $acc->acc_nom : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="pr">Prénom:</label>
        <input type="text" class="form-control" id="pr" name="pr" value="<?php echo isset($acc->acc_prenom) ? $acc->acc_prenom : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="cin">CIN:</label>
        <input type="text" class="form-control" id="cin" name="cin" value="<?php echo isset($acc->acc_cin) ? $acc->acc_cin : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo isset($acc->acc_adresse) ? $acc->acc_adresse : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="tel">Téléphone:</label>
        <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo isset($acc->acc_tel) ? $acc->acc_tel : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role">
          <option value="user" <?php echo isset($acc->acc_role) && $acc->acc_role == 'user' ? 'selected' : ''; ?>>User</option>
          <option value="owner" <?php echo isset($acc->acc_role) && $acc->acc_role == 'owner' ? 'selected' : ''; ?>>Owner</option>
        </select>
      </div>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($acc->acc_username) ? $acc->acc_username : ''; ?>" required>
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




