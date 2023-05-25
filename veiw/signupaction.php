<?php
require_once('../controllers/AccountController.php');
require_once('../models/Account.php');
session_start();

$nom = $_POST["nom"];
$prenom = $_POST["pr"];
$cin = $_POST["cin"];
$adresse = $_POST["adresse"];
$tel = $_POST["tel"];
$role = $_POST["role"];
$username = $_POST["username"];
$pw = $_POST["password"];

$account= new Account($username, $pw, $nom, $prenom ,$cin, $adresse, $tel, $role);
//$voiture= new Voiture($mat,$cin,$carModel);
$AC = new AccountController();

// Validate the username and password
if ($AC->cinExist($cin)) {
    $cinexist = "CIN already exists!";
} else if ($AC->userExist($username)) {
    $userexist = "Username is already in use!";
} else if ($role == "owner") {
    // Save the user as authenticated
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $pw;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['cin'] = $cin;
    $_SESSION['adresse'] = $adresse;
    $_SESSION['tel'] = $tel;
    $_SESSION['role'] = $role;

    header('Location: AddVoiture.php');
    exit();
} else {
    // Save the user as authenticated
   
      // $_SESSION['username'] = $username;
      // $_SESSION['password'] = $pw;
      // $_SESSION['nom'] = $nom;
      // $_SESSION['prenom'] = $prenom;
      // $_SESSION['cin'] = $cin;
      // $_SESSION['adresse'] = $adresse;
      // $_SESSION['tel'] = $tel;
      // $_SESSION['role'] = $role;

    $AC->insertUser($account);

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
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($nom) ? $nom : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="pr">Prénom:</label>
        <input type="text" class="form-control" id="pr" name="pr" value="<?php echo isset($prenom) ? $prenom : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="cin">CIN:</label>
        <input type="text" class="form-control" id="cin" name="cin" value="<?php echo isset($cin) ? $cin : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="adresse">Adresse:</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo isset($adresse) ? $adresse : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="tel">Téléphone:</label>
        <input type="tel" class="form-control" id="tel" name="tel" value="<?php echo isset($tel) ? $tel : ''; ?>" required>
      </div>

      <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role">
          <option value="user" <?php echo isset($role) && $role == 'user' ? 'selected' : ''; ?>>User</option>
          <option value="owner" <?php echo isset($role) && $role == 'owner' ? 'selected' : ''; ?>>Owner</option>
        </select>
      </div>

      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
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




